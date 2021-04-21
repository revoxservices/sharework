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
                            <div class="nk-block-head-sub"><a class="back-to" href="html/support-kb-topics.html"><em class="icon ni ni-arrow-left"></em><span>General</span></a></div>
                            <div class="nk-block-between-md g-4">
                                <div class="nk-block-head-content">
                                    <h2 class="nk-block-title fw-normal">How to enable Two-factor authentication?</h2>
                                    <div class="nk-block-des">
                                        <p>You can easily enable 2FA security on your account from Profile &gt; Settings tab!</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="support-topic-details card card-bordered">
                                <div class="card-inner">
                                    <div class="entry">
                                        <h3>Enable 2FA Authentication</h3>
                                        <h5>What is two-factor authentication?</h5>
                                        <p>Two-factor authentication is an extra layer of security that helps to protect your Envato account. When you have two-factor authentication on your account you will be asked to enter an authentication code in addition to your username and password when logging in.</p>
                                        <h5>How it work</h5>
                                        <p>Each time you log into your Dashlite account you will need to enter your username and password plus an authentication code. You will need to access your authentication code from a mobile app like Google Authenticator. These apps generate time-based codes that are only valid for a small period of time.</p>
                                        <h5>Two-factor authentication enable processs</h5>
                                        <p>Two-factor authentication enable process is given bellow:</p>
                                        <img src="./images/gfx/support.jpg" alt="">
                                        <p>By the given step you can enable Two-factor authentication easily in your Dashlite account.</p>
                                    </div><!-- .entry -->
                                    <div class="support-topic-meta">
                                        <div class="support-topic-author">
                                            <ul class="author-list is-grouped">
                                                <li class="updated"><span class="text-soft fs-12px">Last updated 2 months ago</span></li>
                                                <li data-toggle="tooltip" title="" data-original-title="And 2 more"><span class="user-avatar bg-light text-dark">2</span></li>
                                                <li data-toggle="tooltip" title="" data-original-title="Iliash Hossain"><a href="#"><span class="user-avatar bg-primary">IH</span></a></li>
                                                <li data-toggle="tooltip" title="" data-original-title="Abu Bin Ishtiyak"><a href="#"><span class="user-avatar bg-success">AB</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="support-topic-react">
                                            <ul class="react-list">
                                                <li class="title"><span>Was this page helpful?</span></li>
                                                <li class="react-good"><a title="" data-toggle="tooltip" href="#" data-original-title="Good"><em class="icon ni ni-happyf-fill"></em></a></li>
                                                <li class="react-ok"><a title="" data-toggle="tooltip" href="#" data-original-title="Fair"><em class="icon ni ni-meh-fill"></em></a></li>
                                                <li class="react-bad"><a title="" data-toggle="tooltip" href="#" data-original-title="Bad"><em class="icon ni ni-sad-fill"></em></a></li>
                                            </ul>
                                        </div>
                                    </div><!-- .support-topic-meta -->
                                </div>
                            </div>
                            <div class="support-topic-more card card-bordered">
                                <a class="support-topic-block card-inner" href="#">
                                    <div class="support-topic-context">
                                        <div class="support-topic-title-sub">Next - General</div>
                                        <h5 class="support-topic-title title">Is my information secure?</h5>
                                    </div>
                                    <div class="support-topic-action">
                                        <em class="icon ni ni-chevron-right"></em>
                                    </div>
                                </a>
                            </div><!-- .support-topic-more -->
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