<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="input-group justify-content-center">
                <div class="form-horizontal">
                    <input type="text" v-model="data.name" required>
                    <input type="text" v-model="data.surname" required>
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
                fields: [],
            }
        },
        mounted() {
            var socket = io('http://laravel.dev1:3000', {transports: ['websocket', 'polling']});
            socket.on('nicknames-add:App\\Events\\Api\\v2\\DataEvent', function (data) {
                this.fields.name = data.name;
                this.fields.surname = data.surname;
                $('#nickname-list').append('<li>'+this.fields.name+':'+this.fields.surname+'</li>');
                this.count++;
            }.bind(this));
            console.log('Component mounted.')
        },
        methods: {
            sendData: function () {
                axios({
                    method: 'post',
                    url: 'http://laravel.dev1/api/v2/room/enter',
                    params: {data: [this.data.name, this.data.surname]},
                });
            }
        }
    }
</script>
