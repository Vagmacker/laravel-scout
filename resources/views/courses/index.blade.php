<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .algolia-autocomplete {
            width: 100%;
        }
        .algolia-autocomplete .aa-input, .algolia-autocomplete .aa-hint {
            width: 100%;
            min-height: 30px;
            text-indent: 10px;
        }
        .algolia-autocomplete .aa-hint {
            color: #999;
        }
        .algolia-autocomplete .aa-dropdown-menu {
            width: 100%;
            background-color: #fff;
            border: 1px solid #999;
            border-top: none;
        }
        .algolia-autocomplete .aa-dropdown-menu .aa-suggestion {
            cursor: pointer;
            padding: 5px 4px;
        }
        .algolia-autocomplete .aa-dropdown-menu .aa-suggestion.aa-cursor {
            background-color: #B2D7FF;
        }
        .algolia-autocomplete .aa-dropdown-menu .aa-suggestion em {
            font-weight: bold;
            font-style: normal;
        }
    </style>

</head>
<body>

    <div class="container">

        <blockquote>
            <h3>Courses</h3>
        </blockquote>
        <form action="/" method="get">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">search</i>
                    <input name="str" value="{{$str}}" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Search</label>
                </div>
            </div>
        </form>
    @foreach($courses as $course)
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">{{$course->name}}</span>
                        <p>{{$course->description}}</p>
                    </div>
                    <div class="card-action">
                        <a href="#">By: {{$course->author}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script>
        var client = algoliasearch("SFSDCTG5RL", "df080886779f67475ad6e4c4758e5d82")
        var index = client.initIndex('YourIndex');
        autocomplete('#search-input', {hint: false}, [
            {
                source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
                displayKey: 'my_attribute',
                templates: {
                    suggestion: function(suggestion) {
                        return suggestion._highlightResult.my_attribute.value;
                    }
                }
            }
        ]).on('autocomplete:selected', function(event, suggestion, dataset) {
            console.log(suggestion, dataset);
        });
    </script>
</body>
</html>