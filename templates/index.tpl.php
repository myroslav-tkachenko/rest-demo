<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container" id="rest-client">
            <h1 class="text-center">{{ message }}</h1>

            
            <div class="panel panel-info" v-for="item in items">
                  <div class="panel-heading">
                        <h3 class="panel-title">{{ item.name }}</h3>
                  </div>
                  <div class="panel-body">
                      {{ item.link }}
                  </div>
            </div>
            

            <hr>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/items" method="POST" class="form-horizontal" role="form" v-on:submit.prevent="postItem">

                        <!--<input type="hidden" name="_METHOD" value="PUT"/>-->
                        
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" value="" required="required" title="" v-model="newItem.name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">Link:</label>
                            <div class="col-sm-10">
                                <input type="text" name="link" id="link" class="form-control" value="" required="required" title="" v-model="newItem.link">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            {{ items }}
        </div>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- Vue.js -->
        <script src="https://unpkg.com/vue"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>

        <script>
            Vue.http.options.root = '/items';

            var app = new Vue({
                el: '#rest-client',
                data: {
                    message: 'REST Demo',
                    items: [],
                    newItem: {
                        name: '',
                        link: ''
                    },
                },
                methods: {
                    getItems: function() {
                        this.$http.get('/items').then(response => {
                            this.items = response.body;
                        });
                    },
                    postItem: function() {
                        this.$http.post('/items', this.newItem).then(function() {
                            this.getItems();
                        });
                    }
                }
            });

            app.getItems();
        </script>

    </body>
</html>
