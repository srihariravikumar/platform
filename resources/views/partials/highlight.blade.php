<script src="{{ cdnUrl() }}/js/highlight.min.js"></script>
<script>
    $(function() {
        var aCodes = document.getElementsByTagName('pre');
        for (var i=0; i < aCodes.length; i++) {
            hljs.highlightBlock(aCodes[i]);
        }
    });
</script>