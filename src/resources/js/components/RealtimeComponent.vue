<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="input-group justify-content-center">
                <div class="form-horizontal">
                    <input type="text" v-model="data" required>
                    <button @click="sendData" class="btn btn-primary btn-xs mt-1 mh-100 text mb-1">Add</button>
                </div>
            </div>
            <div class="col-md-2">
                <span>nicknames: {{count}}</span>
                <ul id="nickname-list">
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data : function () {
          return {
              data: [],
              count: 0,
              nickname: '',
          }
        },
        mounted() {
            var socket = io('http://localhost:3000');
            socket.on('nicknames-add:App\\Events\\NicknamesEvent', function (data) {
                this.nickname = data.result;
                $('#nickname-list').append('<li>'+this.nickname+'</li>');
                this.count++;
            }.bind(this));
            console.log('Component mounted.')
        },
        methods: {
            sendData: function () {
                axios({
                    method: 'post',
                    url: '/api/v1/room/enter',
                    params: {data: this.data},
                });
            }
        }
    }
</script>
