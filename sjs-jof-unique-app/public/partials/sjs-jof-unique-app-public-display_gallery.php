<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    sjs_jof_unique_app
 * @subpackage sjs_jof_unique_app/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<?php
    $result = wp_remote_get('http://api.uniqueschoolapp.ie/feeds/gallary?idschool=230');
    $data = json_decode($result['body']);
    $albums = json_encode($data->data->albums);
?>
<div id="myapp">

<v-app>
    <v-main style="max-width: none">
      <v-container fluid>
        <template>
            <template>
              <v-row>
                <v-col
                  v-for="n in albums"
                  :key="n.id"
                  class="d-flex child-flex"
                  cols="4"
                >
                  <v-card class="mx-auto d-flex flex-column" max-width="344">
                    <a target="blank" :href="`https://www.uniqueschoolapp.ie/site/photos/school_id/230/album_id/${n.id}`" >
                     <v-img
                      :src="`${n.thumbnil}`"
                      :lazy-src="`${n.thumbnil}`"
                      aspect-ratio="1"
                      class="grey lighten-2 "
                    >
                    </a> 
                    </v-img>
                    <v-card-text >
                      <a target="blank" :href="`https://www.uniqueschoolapp.ie/site/photos/school_id/230/album_id/${n.id}`" >
                        <h2 class="title primary--text ma-0">{{n.title}}</h2>
                      </a>
                    </v-card-text>
                   <v-spacer></v-spacer>
                    <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn icon >
                                <v-icon>mdi-share-variant</v-icon>
                            </v-btn>  
                    </v-card-actions>
                </v-card>
                </v-col>
              </v-row>
            </template>
        </template>
      </v-container>
    </v-main>
     <v-footer app>
      <!-- -->
    </v-footer>
  </v-app>


</div>
<script>

new Vue({
      el: '#myapp',
      vuetify: new Vuetify(),
      data:{
          albums: []
      },
      created: function(){
          this.albums = JSON.parse(<?php echo json_encode($albums); ?>);
      },
      methods: {},

    });

</script>