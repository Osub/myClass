//替换特殊字符
<script>
function valueReplace(v) {
if (v.indexOf("\"") != -1) {
v = v.toString().replace(new RegExp('(["\"])', 'g'), "\\\"");
}
else if (v.indexOf("\\") != -1)
v = v.toString().replace(new RegExp("([\\\\])", 'g'), "\\\\");
return v;
}
</script>
