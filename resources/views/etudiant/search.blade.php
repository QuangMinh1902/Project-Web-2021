@extends('trame.modele')
@section('title','search')
@section('contents')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"
        integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w=="
        crossorigin="anonymous"></script>
</head>

<body>


    <div class="container" style="padding-top: 70">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Search Cours
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control typeahead" placeholder="Search...." />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th colspan="3">Cours</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        </div>
    </div>


    <script>

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });

        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function(terms, process) {
                return $.get(path, {
                    terms: terms
                }, function(data) {
                    this.data = data;
                    $("table tbody tr").remove();
                    for(const item of data) {
                        console.log(item);
                        var markup = "<tr>"+
                            "<td>" + item.id + "</td>"+
                            "<td>" + item.intitule + "</td>"+
                            "<td>" + item.prenom +" "+item.nom + "</td>"+
                            "<td><a href="{{ route('inscription', ['id' => $c->cours_id]) }}">S'inscrire </a></td>"+
                        "</tr>";
                        $("table tbody").append(markup);
                    }
                    data = data.map(item => item.name = item.intitule);
                    return process(data);
                });
            }
        });

    </script>
</body>

</html>
@endsection
