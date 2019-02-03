<script src="/js/jquery.min.js"></script>
<script src="/js/semantic.min.js"></script>

<script>
    $(document).ready(function () {
        $('.dropdown').dropdown();

        $('.special.cards .image').dimmer({
            on: 'hover'
        });

        // create sidebar and attach to menu open
        $('.ui.sidebar').sidebar('attach events', '.toc.item');

    });
</script>

