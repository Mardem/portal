@extends('layouts.default.dashboard')

@section('localSite', 'Visualizar empresa')
@section('title', 'Visualização de empresas - Portal Formosa')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('notificacoes') }}">Notificação</a></li>
        <li class="breadcrumb-item active">{{ $not->remetente }}</li>
    </ol>
@endsection
@section('container')
    <div class="container">

        <div class="card">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <b class="ion-ribbon-b" style="color: #0862af"> Remetente:</b> {{ $not->remetente }}
                        </div>

                        <div class="col-sm-4">
                            <b class="ion-chatbubbles" style="color: #0862af"> Assunto:</b> {{ $not->assunto }}
                        </div>
                        <div class="col-sm-4">
                            <b class="ion-calendar" style="color: #0862af"> Recebido:</b>
                            @php
                                $date = new Date($not->created_at);
                            echo $date->ago();
                            @endphp
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-12">
                            <p class="lead ion-chatbubble" align="center">
                                {{ $not->texto }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="accordion">
                                <div class="card" style="padding: 0;">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#mensagemInterna" aria-expanded="true" aria-controls="mensagemInterna">
                                                <i class="fa fa-send"></i> Enviar mensagem interna
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="mensagemInterna" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body" style="padding: 10px;">
                                            <p>Escreva a mensagem para o usuário.</p>

                                            <form action="{{ route('respostaNotificacao') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="remetente" value="{{ $not->remetente }}">
                                                <label>Assunto:</label>
                                                <input type="text" class="form-control" name="assunto" value="{{ $not->assunto }}">
                                                <div class="form-group">
                                                    <textarea name="mensagem" class="form-control" rows="10" style="height: inherit !important;" placeholder=" Digite aqui a sua mensagem" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-send"></i> Enviar
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('notificacoes') }}"> <i class="fa fa-backward"></i> Voltar</a>

                    <span style="float: right">
                        <a href="{{ route('finalizarNotificacao', [$not->id]) }}" class="btn btn-success ion-checkmark-round" style="margin-right: 10px"> Finalizar</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('links-src')
    <style>
        hr {
            border-top: 1px solid #b3b3b31a !important;
            margin-top: 40px;
        }
    </style>
@endsection
