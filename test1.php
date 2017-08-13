
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

<select id="ok" name="ok">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option> 
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>


</select>
<input type="text" id="kk" name="kk">
<script>
   
    
    $('#ok').change(function(){
         var kkk = $('#ok').val();
       alert(kkk) ;
       $('#kk').val(kkk);
    });
    
    
</script>
