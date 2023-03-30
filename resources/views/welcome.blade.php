        @include('includes.header')

        <div class="header-spacer"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ asset($top_post->featured) }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $top_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="{{ route('post.single', ['slug' => $top_post->slug]) }}" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center">
                                    <a
                                        href="{{ route('post.single', ['slug' => $top_post->slug]) }}">{{ $top_post->title }}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published">
                                            {{ $top_post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>

                                        <a href="#">#{{ $top_post->category->name }}</a>

                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
                <div class="col-lg-2"></div>
            </div>

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-6">
                        <article class="hentry post post-standard has-post-thumbnail sticky">

                            <div class="post-thumb">
                                <img src="{{ asset($post->featured) }}" alt="{{ $post->title }} image">
                                <div class="overlay"></div>
                                <a href="{{ asset($post->featured) }}" class="link-image js-zoom-image">
                                    <i class="seoicon-zoom"></i>
                                </a>
                                <a href="#" class="link-post">
                                    <i class="seoicon-link-bold"></i>
                                </a>
                            </div>

                            <div class="post__content">

                                <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center">
                                        <a
                                            href="{{ route('post.single', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published">
                                                {{ $post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">#{{ $post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="container-fluid">
            <div class="row medium-padding120 bg-border-color">
                <div class="container">
                    <div class="col-lg-12">
                        @foreach ($categories as $category)
                            <div class="offers">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                        <div class="heading">
                                            <h4 class="h1 heading-title">{{ $category->name }}</h4>
                                            <div class="heading-line">
                                                <span class="short-line"></span>
                                                <span class="long-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="case-item-wrap">
                                        @foreach ($category->posts()->latest()->take(3)->get() as $post)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="case-item">
                                                    <div class="case-item__thumb">
                                                        <img src="{{ asset($post->featured) }}"
                                                            alt="{{ $post->title }} image">
                                                    </div>
                                                    <h6 class="case-item__title text-center"><a
                                                            href="#">{{ $post->title }}</a></h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="padded-50"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        <!-- Footer -->
        @include('includes.footer')
        <!-- End Footer -->
