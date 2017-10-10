<script type="text/javascript">

         $(function() {
         $("#btndel").click(function(){
          var a = [];
         var cboxes = $('input[name="suppcheck[]"]:checked');
         var len = cboxes.length;
        for (var i=0; i<len; i++) {
            a[i] = cboxes[i].value;
          }
          console.log(a);
         var element = $(this);
         if(confirm("Are you sure you want to group delete this?"))
         {
          $.ajax({
            type: "POST",
            url: "groupDeleteSupp",
            data: "ids":[{info:a}],
            alert(data);
            success: function(){
          }
         });
           $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
           .animate({ opacity: "hide" }, "slow");
          }
         return false;
         });
         });   
</script>
	
$data = Input::all();
        //p($data);
        if(Request::ajax())
        {
        $ids = $request->input('info');

        if(isset($ids))
        {
            DB::table('supplier')->whereIn('RefAddress', $ids)->delete(); 
            DB::table('address')->whereIn('ID', $ids)->delete(); 
            Session::put('groupDelete');
            return redirect('/Suppliers');
        }
        else
        {
            Session::put('groupFail');
            return redirect('/Suppliers');
        }
    }