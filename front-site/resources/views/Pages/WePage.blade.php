@extends('Layout.app')
@section('title', "Home")


@section('content')
    <div id="we">
        <div id="weare" class="we-item section-container mt-3">

        </div>
    </div>
    <script>
        GetData('/get-all-weare', function (response){
            if(response.status === 200){
                let data = response.data;
                data.forEach(function (item,index){
                    let weare = item.weare;
                    if(weare.length > 0){
                        $('#weare').append(`
                            <h2 class="text-center p-3 mt-3 mb-3"><span style="border-bottom: 1px solid #eeeaea;">${data[index].name}</span></h2>
                            <div id="weitem${index}" class="we-item-member row justify-content-center">

                            </div>
                        `)

                        weare.forEach(function (weitem){
                            $('#weitem'+index).append(`
                                <div class="col-6 col-md-4 col-lg-3 mt-2 mb-2">
                                    <div class="card border-0 pt-3 pb-3 we-member-card align-items-center justify-content-center">
                                        <img src="${weitem.image}" height="180px" width="180px" class="img-thumbnail rounded-circle">
                                        <h4 class="mt-3 mb-0 text-center">${weitem.name}</h4>
                                        <p class="mb-0 text-secondary text-center">${weitem.designation}</p>
                                    </div>
                                </div>
                            `)
                        })
                    }
                })
                BodyLoaderOFF();
            }
        });
    </script>

@endsection
