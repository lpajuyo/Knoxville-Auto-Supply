    <p>Sales Report</p>
    
    <div id="range-dropdown">
        <select name='range'>
            <option value="day" selected>Today</option>
            <option value="week">This week</option>
            <option value="month">This month</option>
        </select>
    </div>
 
    <div id="sales_report">
    </div>
    
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "<?php echo base_url('knoxville/viewSalesReport'); ?>",
                type: "POST",
                data: "range=day",
                
                success: function(data){
                    $('#sales_report').html(data);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#range-dropdown select').change(function(event){
                var selRange = $(this).val();
                $.ajax({
                    url: "<?php echo base_url('knoxville/viewSalesReport'); ?>",
                    type: "POST",
                    data: "range="+selRange,
                    
                    success: function(data){
                        $('#sales_report').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>