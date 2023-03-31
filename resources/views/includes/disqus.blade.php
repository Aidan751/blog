<div id="disqus_thread"></div>


<script>
    var disqus_config = function() {
        this.page.url = {{ route('post.single', ['slug' => $post->slug]) }};
        this.page.identifier = {{ $post->slug }};
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = 'https://laravel-blog-gexmfr2cti.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
