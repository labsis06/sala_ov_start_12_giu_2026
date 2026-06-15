<?php
\defined('_JEXEC') or die;

if (!function_exists('salaovRenderAvailabilityCalendar')) {
    function salaovBuildDayStatus(array $slots, array $availability, array $dayRules = [], int $months = 6, array $daySlots = []): array
    {
        $slotsByWeekday = [];
        foreach ($slots as $slot) {
            $weekday = (int) $slot->weekday;
            $slotsByWeekday[$weekday] = ($slotsByWeekday[$weekday] ?? 0) + (int) $slot->capacity;
        }
        $specificCapacity = [];
        foreach ($daySlots as $slot) {
            $d = (string) $slot->visit_date;
            $specificCapacity[$d] = ($specificCapacity[$d] ?? 0) + (int) $slot->capacity;
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
            if (isset($specificCapacity[$dateKey])) {
                $capacity = (int) $specificCapacity[$dateKey];
            }
            if (isset($rules[$dateKey])) {
                $availableRule = (int) $rules[$dateKey]->available;
                $capacity = isset($specificCapacity[$dateKey]) ? min($capacity, (int) $rules[$dateKey]->capacity) : (int) $rules[$dateKey]->capacity;
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
        $daySlots = $options['daySlots'] ?? [];
        $days = salaovBuildDayStatus($slots, $availability, $dayRules, $months, $daySlots);
        $monthNames = [1=>'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
        $weekdayNames = ['Lun','Mar','Mer','Gio','Ven','Sab','Dom'];
        $weekdayFullNames = [1=>'Lunedì',2=>'Martedì',3=>'Mercoledì',4=>'Giovedì',5=>'Venerdì',6=>'Sabato',7=>'Domenica'];
        $grouped = [];
        foreach ($days as $dateKey => $info) { $grouped[$info['date']->format('Y-m')][$dateKey] = $info; }
        $uid = 'salaovcal' . substr(md5((string) microtime(true)), 0, 8);
        ob_start(); ?>
        <style>
#<?php echo $uid; ?> .salaov-legend {
    display: flex !important;
    flex-direction: column !important;
    align-items: flex-start !important;
    gap: 4px !important;
}

#<?php echo $uid; ?> .salaov-legend-row {
    display: flex !important;
    align-items: center !important;
    gap: 6px !important;
    line-height: 1.2 !important;
}

#<?php echo $uid; ?> .salaov-dot {
    display: inline-block !important;
    width: 12px !important;
    height: 12px !important;
    min-width: 12px !important;
    border-radius: 50% !important;
    padding: 0 !important;
    border: 1px solid rgba(0,0,0,.25) !important;
}

#<?php echo $uid; ?> .salaov-dot-available {
    background: #198754 !important;
}

#<?php echo $uid; ?> .salaov-dot-pending {
    background: #ffc107 !important;
}

#<?php echo $uid; ?> .salaov-dot-unavailable {
    background: #dc3545 !important;
}

#<?php echo $uid; ?> .salaov-legend-count {
    margin-top: 2px !important;
    font-weight: 700 !important;
}
      
        #<?php echo $uid; ?>.salaov-calendar{
    width:100%!important;
    max-width:900px!important;
    margin:1rem 0 1.5rem 0!important;
    border:1px solid #d9e2ec!important;
    border-radius:12px!important;
    background:#fff!important;
    overflow:hidden!important
}
        #<?php echo $uid; ?> .salaov-weekdays,#<?php echo $uid; ?> .salaov-days{display:grid!important;grid-template-columns:repeat(7,1fr)!important;gap:6px!important;align-items:stretch!important;width:100%!important}
        #<?php echo $uid; ?> .salaov-weekdays span{display:block!important;text-align:center!important;font-weight:900!important;padding:6px 2px!important;color:#1f2937!important}
        #<?php echo $uid; ?> .salaov-day,
#<?php echo $uid; ?> .salaov-empty{
    display:flex!important;
    width:100%!important;
    min-width:0!important;
    height:72px!important;
    min-height:72px!important;
    box-sizing:border-box!important;
    border-radius:6px!important
}
        #<?php echo $uid; ?> .salaov-empty{visibility:hidden!important}
        #<?php echo $uid; ?> .salaov-day{flex-direction:column!important;align-items:center!important;justify-content:center!important;text-align:center!important;white-space:normal!important;line-height:1.15!important;padding:3px 2px!important;font-weight:900!important;border:1px solid rgba(0,0,0,.15)!important}
        #<?php echo $uid; ?> .salaov-day-weekday,#<?php echo $uid; ?> .salaov-day-number,#<?php echo $uid; ?> .salaov-day-caption{display:block!important;width:100%!important;font-weight:900!important;text-align:center!important;line-height:1.12!important;margin:0!important;padding:0!important}
        #<?php echo $uid; ?> .salaov-day-weekday{font-size:.82rem!important}
        #<?php echo $uid; ?> .salaov-day-number{font-size:1.45rem!important}
        #<?php echo $uid; ?> .salaov-day-caption{font-size:.70rem!important}
        #<?php echo $uid; ?> .salaov-day-available{background:#198754!important;color:#fff!important}
        #<?php echo $uid; ?> .salaov-day-pending{background:#ffc107!important;color:#212529!important}
        #<?php echo $uid; ?> .salaov-day-unavailable{background:#dc3545!important;color:#fff!important}
        @media(max-width:576px){#<?php echo $uid; ?> .salaov-weekdays,#<?php echo $uid; ?> .salaov-days{gap:3px!important}#<?php echo $uid; ?> .salaov-day,#<?php echo $uid; ?> .salaov-empty{height:78px!important;min-height:78px!important}#<?php echo $uid; ?> .salaov-day-weekday{font-size:.58rem!important}#<?php echo $uid; ?> .salaov-day-number{font-size:1.15rem!important}#<?php echo $uid; ?> .salaov-day-caption{font-size:.55rem!important}}
        </style>
        <section id="<?php echo $uid; ?>" class="salaov-calendar card shadow-sm" aria-label="Calendario disponibilita Sala OV">
            <div class="card-body p-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                    <div><h2 class="h5 mb-1">Calendario disponibilità</h2></div>
                    
   <div class="salaov-legend small">
    <div class="salaov-legend-row">
        <span class="salaov-dot salaov-dot-available"></span>
        <span>Disponibile</span>
    </div>
    <div class="salaov-legend-row">
        <span class="salaov-dot salaov-dot-pending"></span>
        <span>Richieste in attesa</span>
    </div>
    <div class="salaov-legend-row">
        <span class="salaov-dot salaov-dot-unavailable"></span>
        <span>Non disponibile</span>
    </div>
    <div class="salaov-legend-count">0/20 = prenotati/capienza</div>
</div>
                
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
                            <?php foreach($monthDays as $dateKey=>$info):
                                $disabled = (!$selectable || $info['status']==='unavailable');
                                $remaining = max(0, (int) $info['capacity'] - (int) $info['used']);
                                $dayNumber = $info['date']->format('j');
                                $weekdayNumber = (int) $info['date']->format('N');
                                $weekdayShort = $weekdayNames[$weekdayNumber - 1] ?? '';
                                $weekdayFull = $weekdayFullNames[$weekdayNumber] ?? '';
                                $monthLabel = $monthNames[(int) $info['date']->format('n')] ?? '';
                                $caption = $weekdayFull . ' ' . $dayNumber . ' ' . $monthLabel . ' - Visitatori ' . (int) $info['used'] . '/' . (int) $info['capacity'];
                                if ($info['status'] === 'available') { $style = 'background:#198754;color:#ffffff;border-color:#198754;'; }
                                elseif ($info['status'] === 'pending') { $style = 'background:#ffc107;color:#212529;border-color:#ffc107;'; }
                                else { $style = 'background:#dc3545;color:#ffffff;border-color:#dc3545;'; }
                                $title=$info['label'].' - '.$weekdayFull.' '.$dayNumber.' '.$monthLabel.' '.$info['date']->format('Y').' - visitatori '.(int)$info['used'].'/'.(int)$info['capacity'].' - posti residui '.$remaining.($info['note']?' - '.$info['note']:''); ?>
                                <button type="button" class="salaov-day salaov-day-<?php echo $info['status']; ?>" style="<?php echo $style; ?>" data-date="<?php echo htmlspecialchars($dateKey, ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo htmlspecialchars($caption, ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $disabled?'disabled':''; ?>>
                                    <strong class="salaov-day-weekday"><?php echo htmlspecialchars($weekdayFull, ENT_QUOTES, 'UTF-8'); ?></strong><br>
                                    <strong class="salaov-day-number"><?php echo str_pad((string) $dayNumber, 2, '0', STR_PAD_LEFT); ?></strong><br>
                                    <strong class="salaov-day-caption">capienza <?php echo (int) $info['used']; ?>/<?php echo (int) $info['capacity']; ?></strong>
                                </button>
                            <?php endforeach; ?>
                            <?php
                                $lastInfo = end($monthDays);
                                $lastWeekday = $lastInfo ? (int) $lastInfo['date']->format('N') : 7;
                                for ($i = $lastWeekday; $i < 7; $i++):
                            ?>
                                <span class="salaov-empty" aria-hidden="true"></span>
                            <?php endfor; ?>
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
