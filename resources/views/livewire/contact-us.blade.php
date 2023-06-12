@push('title') Contact Us @endpush
<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Contact us</span></li>
            </ul>
        </div>
        <div class="row">
            <div class=" main-content-area">
                <div class="wrap-contacts ">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="contact-box contact-form">
                            @if (session()->has('message'))
                            <div class="message-bac">
                                <h5>{{ session()->get('message') }}</h5>
                            </div>
                            @endif
                            <h2 class="box-title">Leave a Message</h2>
                            <form wire:submit.prevent='sendMessage' method="get" name="frm-contact">
                                <label for="name">Name<span>*</span></label> <br>
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                                <input wire:model='name' type="text" value="" id="name" name="name">
                                <label for="email">Email<span>*</span></label> <br>
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                                <input wire:model='email' type="text" value="" id="email" name="email">
                                <label for="phone">Number Phone</label> <br>
                                @error('phone') <span class="error">{{ $message }}</span> @enderror
                                <input wire:model='phone' type="text" value="" id="phone" name="phone">
                                <label for="comment">Comment</label> <br>
                                @error('comment') <span class="error">{{ $message }}</span> @enderror
                                <textarea wire:model='comment' name="comment" id="comment"></textarea>
                                <input type="submit" name="ok" value="Submit">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="contact-box contact-info">
                            <h2 class="box-title">Contact Detail</h2>
                            <div class="wrap-icon-box">
                                <div class="icon-box-item">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Email</b>
                                        <p>{{ $settings->email }}</p>
                                    </div>
                                </div>
                                <div class="icon-box-item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Phone</b>
                                        <p>{{ $settings->phone }}</p>
                                    </div>
                                </div>
                                <div class="icon-box-item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Phone Office</b>
                                        <p>{{ $settings->phone2 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end main products area-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</main>
