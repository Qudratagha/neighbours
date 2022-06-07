
@section('more-script')

    <script>
        var qtyindzn = {{$qtyInDozens}};
        $(function(){
            $('#EggQuantity').change(function()
            {

                if(this.value > qtyindzn)
                {
                    alert('Please do not exceed the Available Quantity');
                    $('#EggQuantity').val(qtyindzn);
                }
            });
        });
    {{--$(document).ready(function() {--}}
    {{--    $('#test1').change(function (e) {--}}
    {{--        $.ajax({--}}
    {{--            url: "{{route('poultry_daily.totalEggs')}}",--}}
    {{--            method: 'get',--}}
    {{--            success: function (result) {--}}
    {{--                console.log(result);--}}
    {{--                $('#testing').html('Your Total Incubated Eggs = ' + result +' Dozen');--}}
    {{--                $('#quantity').change(function () {--}}
    {{--                    // console.log(this.value);--}}
    {{--                    if (this.value > result) {--}}
    {{--                        alert('Please do not exceed the Available Quantity');--}}
    {{--                        $('#quantity').val(result);--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            }--}}
    {{--        });--}}
    {{--    });--}}
    {{--});--}}
</script>
@endsection
