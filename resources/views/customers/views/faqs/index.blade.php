@extends('layouts.customers')

@section('body', 'npc-subscription has-aside has-touch nk-nio-theme')

@section('content')

    <div class="nk-content ">
        <div class="container wide-xl">
            <div class="nk-content-inner">
                
                @include ('customers.includes.nav')

                <div class="nk-content-body">
                    <div class="nk-content-wrap">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-head-sub"><a class="back-to" href="html/support-kb.html"><em class="icon ni ni-arrow-left"></em><span>Basado en conocimiento</span></a></div>
                            <div class="nk-block-between-md g-4">
                                <div class="nk-block-head-content">
                                    <h2 class="nk-block-title fw-normal">Preguntas Frecuentes</h2>
                                    <div class="nk-block-des">
                                        <p>Puede encontrar todas las preguntas y respuestas acerca de cómo proteger su cuenta</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    @foreach ($faqs as $faq)
                                        <div class="support-queue-item">
                                            <a class="support-queue-link" >
                                                <div class="support-queue-media">
                                                    <em class="icon icon-circle ni ni-shield-check bg-gray"></em>
                                                </div>
                                                <div class="support-queue-body">
                                                    <div class="support-queue-context">
                                                        <h5 class="support-queue-title title">{!! $faq->question !!}</h5>
                                                        <div class="support-queue-desc">{!! $faq->answer !!}</div>
                                                    </div>
                                                    <div class="support-queue-update">
                                                        <span>{{ formatedDate($faq->created_at) }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!-- .support-queue-item -->
                                    
                                    @endforeach
                                </div>
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div>
                    <!-- footer @s -->
                    <div class="nk-footer">
                        <div class="container wide-xl">
                            <div class="nk-footer-wrap g-2">
                                <div class="nk-footer-copyright"> © 2021 Share Work. 
                                </div>
                                <div class="nk-footer-links">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer @e -->
                </div>

                
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush