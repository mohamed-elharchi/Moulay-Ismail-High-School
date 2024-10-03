<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absence Table</title>

    <style>
        table,
        tr,
        td {
            border: 1px solid rgb(150, 150, 150);
            border-collapse: collapse;
        }

        tr,
        td {
            padding: 5px;
            text-align: center;
        }

        /* table,
      tr,
      .borderRemove {
        border-top: none !important;
        border-right: none !important;
      } */
    </style>
</head>

<body>


    <table style="direction: rtl ">
        <tr>
            <td style="background-color: rgb(201, 198, 198)" class="borderRemove" colspan="1" rowspan="5"></td>
            <td style="background-color: rgb(201, 198, 198)" colspan="2">ثانوية مولاي اسماعيل التأهيلية</td>
            <td style="background-color: rgb(201, 198, 198)" colspan="2" rowspan="2">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/dd.png'))) }}"
                    alt="" width="100%" />
            </td>
            <td style="background-color: rgb(201, 198, 198)" colspan="2">السنة الدراسية : 2024 - 2023</td>
        </tr>
        <tr>
            <!-- <td class="borderRemove" colspan="1"></td> -->
            <td colspan="2">مـديرية اقـليـم الـدريـوش</td>
            <td colspan="2">القـسـم: {{ $departmentName }}</td>
        </tr>
        <tr style="background-color: rgb(201, 198, 198)">
            <!-- <td colspan="1"></td> -->
            <td colspan="3">مـن :{{ date('d-m-Y', strtotime($fromDate)) }}</td>
            <td colspan="3">إلـى : {{ date('d-m-Y', strtotime($fromDate . ' +5 days')) }}</td>
        </tr>
        <tr>
            <!-- <td class="borderRemove"></td> -->
            <td style="width: 15%">الاثنين</td>
            <td style="width: 15%">الثلاثاء</td>
            <td style="width: 15%">الأربعاء</td>
            <td style="width: 15%">الخميس</td>
            <td style="width: 15%">الجمعة</td>
            <td style="width: 15%">السبت</td>
        </tr>
        <tr style="background-color: rgb(201, 198, 198)">
            <!-- <td class="borderRemove"></td> -->
            <td>{{ date('d-m-Y', strtotime($fromDate)) }}</td>
            <td>{{ date('d-m-Y', strtotime($fromDate . ' +1 day')) }}</td>
            <td>{{ date('d-m-Y', strtotime($fromDate . ' +2 days')) }}</td>
            <td>{{ date('d-m-Y', strtotime($fromDate . ' +3 days')) }}</td>
            <td>{{ date('d-m-Y', strtotime($fromDate . ' +4 days')) }}</td>
            <td>{{ date('d-m-Y', strtotime($fromDate . ' +5 days')) }}</td>
        </tr>
        <tr>
            <td>تلاميذ يوجهون الى مكتب الغياب</td>
            <td>
                @php
                    $periods = [
                        '8.30/9.30',
                        '9.30/10.30',
                        '10.30/11.30',
                        '11.30/12.30',
                        '2.30/3.30',
                        '3.30/4.30',
                        '4.30/5.30',
                        '5.30/6.30',
                    ];
                    $latestAbsence = null;
                    $previousDay = Carbon\Carbon::parse(strtotime($fromDate . ' -1 day'))->subDay();

                    while (!$latestAbsence) {
                        foreach ($periods as $period) {
                            $previousDayAbsence = $absences
                                ->where('date', $previousDay->format('Y-m-d'))
                                ->where('period', $period)
                                ->sortByDesc('created_at')
                                ->first();

                            if ($previousDayAbsence) {
                                if (!$latestAbsence || $previousDayAbsence->created_at > $latestAbsence->created_at) {
                                    $latestAbsence = $previousDayAbsence;
                                }
                            }
                        }

                        $previousDay->subDay();

                        if ($previousDay < Carbon\Carbon::parse($fromDate)->subDays(30)) {
                            break;
                        }
                    }

                    if ($latestAbsence) {
                        echo $latestAbsence->absence . '<br>';
                    }
                @endphp
            </td>
            <td>
                @php
                    $periods = [
                        '8.30/9.30',
                        '9.30/10.30',
                        '10.30/11.30',
                        '11.30/12.30',
                        '2.30/3.30',
                        '3.30/4.30',
                        '4.30/5.30',
                        '5.30/6.30',
                    ];
                    $latestAbsence = null;
                    $previousDay = Carbon\Carbon::parse(strtotime($fromDate . ' +1 day'))->subDay();

                    while (!$latestAbsence) {
                        foreach ($periods as $period) {
                            $previousDayAbsence = $absences
                                ->where('date', $previousDay->format('Y-m-d'))
                                ->where('period', $period)
                                ->sortByDesc('created_at')
                                ->first();

                            if ($previousDayAbsence) {
                                if (!$latestAbsence || $previousDayAbsence->created_at > $latestAbsence->created_at) {
                                    $latestAbsence = $previousDayAbsence;
                                }
                            }
                        }

                        $previousDay->subDay();

                        if ($previousDay < Carbon\Carbon::parse($fromDate)->subDays(30)) {
                            break;
                        }
                    }

                    if ($latestAbsence) {
                        echo $latestAbsence->absence . '<br>';
                    }
                @endphp
            </td>
            <td>
                @php
                    $periods = [
                        '8.30/9.30',
                        '9.30/10.30',
                        '10.30/11.30',
                        '11.30/12.30',
                        '2.30/3.30',
                        '3.30/4.30',
                        '4.30/5.30',
                        '5.30/6.30',
                    ];
                    $latestAbsence = null;
                    $previousDay = Carbon\Carbon::parse(strtotime($fromDate . ' +2 day'))->subDay();

                    while (!$latestAbsence) {
                        foreach ($periods as $period) {
                            $previousDayAbsence = $absences
                                ->where('date', $previousDay->format('Y-m-d'))
                                ->where('period', $period)
                                ->sortByDesc('created_at')
                                ->first();

                            if ($previousDayAbsence) {
                                if (!$latestAbsence || $previousDayAbsence->created_at > $latestAbsence->created_at) {
                                    $latestAbsence = $previousDayAbsence;
                                }
                            }
                        }

                        $previousDay->subDay();

                        if ($previousDay < Carbon\Carbon::parse($fromDate)->subDays(30)) {
                            break;
                        }
                    }

                    if ($latestAbsence) {
                        echo $latestAbsence->absence . '<br>';
                    }
                @endphp
            </td>
            <td>
                @php
                    $periods = [
                        '8.30/9.30',
                        '9.30/10.30',
                        '10.30/11.30',
                        '11.30/12.30',
                        '2.30/3.30',
                        '3.30/4.30',
                        '4.30/5.30',
                        '5.30/6.30',
                    ];
                    $latestAbsence = null;
                    $previousDay = Carbon\Carbon::parse(strtotime($fromDate . ' +3 day'))->subDay();

                    while (!$latestAbsence) {
                        foreach ($periods as $period) {
                            $previousDayAbsence = $absences
                                ->where('date', $previousDay->format('Y-m-d'))
                                ->where('period', $period)
                                ->sortByDesc('created_at')
                                ->first();

                            if ($previousDayAbsence) {
                                if (!$latestAbsence || $previousDayAbsence->created_at > $latestAbsence->created_at) {
                                    $latestAbsence = $previousDayAbsence;
                                }
                            }
                        }

                        $previousDay->subDay();

                        if ($previousDay < Carbon\Carbon::parse($fromDate)->subDays(30)) {
                            break;
                        }
                    }

                    if ($latestAbsence) {
                        echo $latestAbsence->absence . '<br>';
                    }
                @endphp
            </td>
            <td>
                @php
                    $periods = [
                        '8.30/9.30',
                        '9.30/10.30',
                        '10.30/11.30',
                        '11.30/12.30',
                        '2.30/3.30',
                        '3.30/4.30',
                        '4.30/5.30',
                        '5.30/6.30',
                    ];
                    $latestAbsence = null;
                    $previousDay = Carbon\Carbon::parse(strtotime($fromDate . ' +4 day'))->subDay();

                    while (!$latestAbsence) {
                        foreach ($periods as $period) {
                            $previousDayAbsence = $absences
                                ->where('date', $previousDay->format('Y-m-d'))
                                ->where('period', $period)
                                ->sortByDesc('created_at')
                                ->first();

                            if ($previousDayAbsence) {
                                if (!$latestAbsence || $previousDayAbsence->created_at > $latestAbsence->created_at) {
                                    $latestAbsence = $previousDayAbsence;
                                }
                            }
                        }

                        $previousDay->subDay();

                        if ($previousDay < Carbon\Carbon::parse($fromDate)->subDays(30)) {
                            break;
                        }
                    }

                    if ($latestAbsence) {
                        echo $latestAbsence->absence . '<br>';
                    }
                @endphp
            </td>
            <td>
                @php
                    $periods = [
                        '8.30/9.30',
                        '9.30/10.30',
                        '10.30/11.30',
                        '11.30/12.30',
                        '2.30/3.30',
                        '3.30/4.30',
                        '4.30/5.30',
                        '5.30/6.30',
                    ];
                    $latestAbsence = null;
                    $previousDay = Carbon\Carbon::parse(strtotime($fromDate . ' +5 days'))->subDay();
                    while (!$latestAbsence) {
                        foreach ($periods as $period) {
                            $previousDayAbsence = $absences
                                ->where('date', $previousDay->format('Y-m-d'))
                                ->where('period', $period)
                                ->sortByDesc('created_at')
                                ->first();

                            if ($previousDayAbsence) {
                                if (!$latestAbsence || $previousDayAbsence->created_at > $latestAbsence->created_at) {
                                    $latestAbsence = $previousDayAbsence;
                                }
                            }
                        }

                        $previousDay->subDay();

                        if ($previousDay < Carbon\Carbon::parse($fromDate)->subDays(30)) {
                            break;
                        }
                    }

                    if ($latestAbsence) {
                        echo $latestAbsence->absence . '<br>';
                    }
                @endphp
            </td>


        </tr>
        <tr>
            <td colspan="7">الــــــــــصـــــــــبـــــــــــــاح</td>
        </tr>
        <tr style="background-color: rgb(201, 198, 198)">
            <td>09-08</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '8.30/9.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>
        <tr style="background-color: rgb(201, 198, 198)">
            <td>10-09</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '9.30/10.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        {{-- 11-10 --}}

        <tr style="background-color: rgb(201, 198, 198)">
            <td>11-10</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '10.30/11.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr style="background-color: rgb(201, 198, 198)">
            <td>12-11</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '11.30/12.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>
        <tr>
            <td colspan="7">الــــــــــمــــــــســـــــــــــاء</td>
        </tr>

        <tr style="background-color: rgb(201, 198, 198)">
            <td>03-02</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '2.30/3.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr style="background-color: rgb(201, 198, 198)">
            <td>04-03</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '3.30/4.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>
        <tr style="background-color: rgb(201, 198, 198)">
            <td>05-04</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '4.30/5.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr style="background-color: rgb(201, 198, 198)">
            <td>06-05</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->absence; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>

        <tr>
            <td>التوقيع</td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate)))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +1 day')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +2 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +3 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +4 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
            <td>
                @php
                    $absence = $absences
                        ->where('period', '5.30/6.30')
                        ->where('date', date('Y-m-d', strtotime($fromDate . ' +5 days')))
                        ->first();
                    if ($absence) {
                        echo $absence->signature; // Replace 'data' with the actual column name you want to display
                    }
                @endphp
            </td>
        </tr>
    </table>


</body>

</html>
