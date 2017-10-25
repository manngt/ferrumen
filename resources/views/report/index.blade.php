@extends('layouts.masterreport')

@section('content')
    <div class="row white-box">

        @php
            $engine = App::make("getReporticoEngine");
            $engine->initial_execute_mode = "MENU";
            $engine->access_mode = "ONEPROJECT";
            $engine->initial_project = "ReportesFerrumen";
            $engine->initial_project_password = "G9rGrhpKeuW2QFm3MMC8geBpKnz5Bh5kfpuPrDKsJbv2Fjwgh8";
            $engine->clear_reportico_session = true;
            $engine->execute();
        @endphp

    </div>

@endsection