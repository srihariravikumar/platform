<script src="https://cdn.jsdelivr.net/gh/doctub/cdn@3.0/js/highlight.min.js"></script>
<script>
    $(function() {
        var aCodes = document.getElementsByTagName('pre');
        for (var i=0; i < aCodes.length; i++) {
            hljs.highlightBlock(aCodes[i]);
        }
    });
</script>