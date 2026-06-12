<?php
\defined('_JEXEC') or die;

if (!function_exists('salaovRenderAvailabilityCalendar')) {
    function salaovBuildDayStatus(array $slots, array $availability, array $dayRules = [], int $months = 6): array
    {
        $slotsByWeekday = [];
        foreach ($slots as $slot) {
            $weekday = (int) $slot->weekday;
            $slotsByWeekday[$weekday] = ($slotsByWeekday[$weekday] ?? 0) + (int) $slot->capacity;
        }
        $rules = [];
        foreach ($dayRules as $rule) {
            $rules[(string) $rule->visit_date] = $rule;
        }
        $bookedByDate = [];
        foreach ($availability as $row) {
            $date = (string) $row->visit_date;
            $bookedByDate[$date] = [
                'pending' => (int) ($row->pending_visitors ?? 0),
                'approved' => (int) ($row->approved_visitors ?? 0),
            ];
        }
        $today = new DateTimeImmutable('today');
        $cursor = $today->modify('first day of this month');
        $end = $cursor->modify('+' . max(1, $months - 1) . ' months')->modify('last day of this month');
        $days = [];
        while ($cursor <= $end) {
            $dateKey = $cursor->format('Y-m-d');
            $weekday = (int) $cursor->format('N');
            $capacity = $slotsByWeekday[$weekday] ?? 0;
            $availableRule = 1;
            $note = '';
            if (isset($rules[$dateKey])) {
                $availableRule = (int) $rules[$dateKey]->available;
                $capacity = (int) $rules[$dateKey]->capacity;
                $note = (string) ($rules[$dateKey]->note ?? '');
            }
            $pending = $bookedByDate[$dateKey]['pending'] ?? 0;
            $approved = $bookedByDate[$dateKey]['approved'] ?? 0;
            $used = $pending + $approved;
            if ($cursor < $today || !$availableRule || $capacity <= 0 || $used >= $capacity) {
                $status = 'unavailable'; $label = 'Non disponibile';
            } elseif ($pending > 0) {
                $status = 'pending'; $label = 'Richieste in attesa';
            } else {
                $status = 'available'; $label = 'Disponibile';
            }
            $days[$dateKey] = compact('status','label','capacity','used','pending','approved','note') + ['date' => $cursor];
            $cursor = $cursor->modify('+1 day');
        }
        return $days;
    }

    function salaovRenderAvailabilityCalendar(array $slots, array $availability, array $options = []): string
    {
        $months = (int) ($options['months'] ?? 6);
        $dayRules = $options['dayRules'] ?? [];
        $selectable = !empty($options['selectable']);
        $inputSelector = $options['inputSelector'] ?? '#salaov_visit_date';
        $days = salaovBuildDayStatus($slots, $availability, $dayRules, $months);
        $monthNames = [1=>'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
        $weekdayNames = ['L','M','M','G','V','S','D'];
        $grouped = [];
        foreach ($days as $dateKey => $info) { $grouped[$info['date']->format('Y-m')][$dateKey] = $info; }
        $uid = 'salaovcal' . substr(md5((string) microtime(true)), 0, 8);
        ob_start(); ?>
        <section id="<?php echo $uid; ?>" class="salaov-calendar card shadow-sm" aria-label="Calendario disponibilita Sala OV">
            <div class="card-body p-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                    <div><h2 class="h5 mb-1">Calendario disponibilita</h2><p class="text-muted small mb-0">Naviga i mesi e seleziona un giorno disponibile.</p></div>
                    <div class="salaov-legend small"><span class="salaov-dot bg-success"></span> Disponibile <span class="salaov-dot bg-warning"></span> Pending <span class="salaov-dot bg-danger"></span> Non disponibile</div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary salaov-prev">&lsaquo;</button>
                    <strong class="salaov-current-month"></strong>
                    <button type="button" class="btn btn-sm btn-outline-secondary salaov-next">&rsaquo;</button>
                </div>
                <div class="salaov-months">
                <?php $idx=0; foreach ($grouped as $monthKey => $monthDays): $first = reset($monthDays)['date']; $firstOfMonth=$first->modify('first day of this month'); $offset=(int)$firstOfMonth->format('N')-1; ?>
                    <div class="salaov-month" data-index="<?php echo $idx; ?>" data-title="<?php echo $monthNames[(int)$first->format('n')] . ' ' . $first->format('Y'); ?>" <?php echo $idx ? 'hidden' : ''; ?>>
                        <div class="salaov-weekdays"><?php foreach($weekdayNames as $w): ?><span><?php echo $w; ?></span><?php endforeach; ?></div>
                        <div class="salaov-days">
                            <?php for($i=0;$i<$offset;$i++): ?><span></span><?php endfor; ?>
                            <?php foreach($monthDays as $dateKey=>$info): $disabled = (!$selectable || $info['status']==='unavailable'); $title=$info['label'].' '.$dateKey.' - posti '.max(0,$info['capacity']-$info['used']).'/'.$info['capacity'].($info['note']?' - '.$info['note']:''); ?>
                                <button type="button" class="salaov-day salaov-day-<?php echo $info['status']; ?>" data-date="<?php echo htmlspecialchars($dateKey, ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $disabled?'disabled':''; ?>>
                                    <span><?php echo $info['date']->format('j'); ?></span><small><?php echo max(0,$info['capacity']-$info['used']); ?></small>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php $idx++; endforeach; ?>
                </div>
            </div>
        </section>
        <script>
        (function(){
            var root=document.getElementById('<?php echo $uid; ?>'); if(!root) return;
            var months=[].slice.call(root.querySelectorAll('.salaov-month')); var i=0; var title=root.querySelector('.salaov-current-month');
            function show(n){ i=Math.max(0,Math.min(months.length-1,n)); months.forEach(function(m,k){m.hidden=k!==i;}); title.textContent=months[i]?months[i].dataset.title:''; root.querySelector('.salaov-prev').disabled=i===0; root.querySelector('.salaov-next').disabled=i===months.length-1; }
            root.querySelector('.salaov-prev').addEventListener('click',function(){show(i-1);}); root.querySelector('.salaov-next').addEventListener('click',function(){show(i+1);}); show(0);
            <?php if ($selectable): ?>root.addEventListener('click',function(e){ var day=e.target.closest('.salaov-day:not(:disabled)'); if(!day) return; var input=document.querySelector('<?php echo addslashes($inputSelector); ?>'); if(input){ input.value=day.dataset.date; input.dispatchEvent(new Event('change')); } root.querySelectorAll('.salaov-day-selected').forEach(function(el){el.classList.remove('salaov-day-selected')}); day.classList.add('salaov-day-selected'); });<?php endif; ?>
        })();
        </script>
        <?php return ob_get_clean();
    }
}
