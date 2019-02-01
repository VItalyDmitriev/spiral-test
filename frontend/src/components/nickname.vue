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
    import axios from 'axios';
    import io from 'socket.io-client';
    export default {
        data : function () {
            return {
                data: [],
                count: 0,
                name: [],
            }
        },
        mounted() {
            var socket = io('http://laravel.dev1:3000', {transports: ['websocket', 'polling']});
            socket.on('nicknames-add:App\\Events\\Api\\v1\\DataEvent', function (data) {
                this.name = data.result;
                $('#nickname-list').append('<li>'+this.name+'</li>');
                this.count++;
            }.bind(this));
            console.log('Component mounted.')
        },
        methods: {
            sendData: function () {
                axios({
                    method: 'post',
                    url: 'http://laravel.dev1/api/v1/room/enter',
                    params: {data: this.data},
                });
            }
        }
    }
</script>
