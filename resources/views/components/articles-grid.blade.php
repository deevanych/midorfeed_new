<div class="articles-grid">
    @foreach ($articles as $article)
        @if ($loop->iteration == 1 || $loop->iteration == 5 || $loop->iteration == 7)
            <x-article-short-preview :article="$article"/>
            @if ($loop->iteration == 1)
                <div class="col-3">
                    <!-- Yandex.RTB R-A-396149-4 -->
                    <div id="yandex_rtb_R-A-396149-4" class="yandex-articles"></div>
                    <script type="text/javascript">
                        (function (w, d, n, s, t) {
                            w[n] = w[n] || [];
                            w[n].push(function () {
                                Ya.Context.AdvManager.render({
                                    blockId: "R-A-396149-4",
                                    renderTo: "yandex_rtb_R-A-396149-4",
                                    async: true
                                });
                            });
                            t = d.getElementsByTagName("script")[0];
                            s = d.createElement("script");
                            s.type = "text/javascript";
                            s.src = "//an.yandex.ru/system/context.js";
                            s.async = true;
                            t.parentNode.insertBefore(s, t);
                        })(this, this.document, "yandexContextAsyncCallbacks");
                    </script>
                </div>
            @endif
        @endif
        @if ($loop->iteration == 2 || $loop->iteration == 4)
            <x-article-short-preview-reverse :article="$article"/>
        @endif
        @if ($loop->iteration == 3 || $loop->iteration == 6)
            <x-article-short-preview-background :article="$article"/>
        @endif
    @endforeach
    {!! $links !!}
</div>
