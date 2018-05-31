@extends('layouts.app')

@section('content')

    <div id="app">
        <div class="list-group">
            <a href="#" class="list-group-item active">{{ $user }}'s followers</a>
            <a href="#" class="list-group-item" v-for="follower in followers">@{{ follower.login }}</a>
            <a href="#" class="list-group-item active" v-if="isMore" @click.prevent="getFollowers()">Load more</a>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        new Vue({
            el: '#app',
            data: {
                user: '{{ $user }}',
                page: 1,
                followers: [],
                isMore: true
            },
            methods: {
                getFollowers() {
                    axios.get(`https://api.github.com/users/${this.user}/followers?page=${this.page}`)
                        .then(response => {
                            if (response.data.length == 0) {
                                this.isMore = false;

                                return;
                            }

                            response.data.forEach(follower => {
                                this.followers.push(follower);
                            });
                            this.page++;
                        });
                }
            },
            mounted() {
                this.getFollowers();
            }
        });
    </script>
@stop
