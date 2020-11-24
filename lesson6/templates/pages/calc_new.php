<form method="GET">
     <input type="number" name="x">
     <button type="button" name="+" value="+" onclick='oper()'>+</button>
     <button type="button" name="-" value="-" onclick='oper()'>-</button>
     <button type="button" name="*" value="*" onclick='oper()'>*</button>
     <button type="button" name="/" value="/" onclick='oper()'>/</button>
     <button type="button" onclick='calc()'>=</button>
     <button type="submit" name="operation">=</button>
</form>

<script>
     let operation = document.getElementsByName('operation');
     // var a = document.getElementsByName('x');
     var operant = null;



     function oper() {

          x = $("[name='x']").val();

          operant = event.target.name;

          $.get("result", );

          $("[name='x']").val(null)
     }

     function calc() {
          $.get("calc_new", 'x1=' + x + '&x2=' + $("[name='x']").val() + '&operation=' + operant);
     }
</script>