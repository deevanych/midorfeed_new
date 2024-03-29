<template>
    <div class="comments__item">
        <a :href="comment.author.link" class="comments__item-author-avatar">
            <img :src="comment.author.avatar_url" alt="">
        </a>
        <div class="comments__item-body">
            <div>
                <a :href="comment.author.link" class="comment-author">
                    {{ comment.author.personaname }}
                </a>
                <div class="comments__item-text" @click.prevent="(canCommenting() ? activateReplyForm() : '')">
                    {{ comment.text }}
                </div>
                <div class="comments__item-action">
                    <div class="comments__item-create_time" data-toggle="tooltip"
                         data-placement="bottom"
                         :title="date_created_at"
                         :data-original-title="date_created_at">
                        {{ created_at }}
                    </div>
                    <a href="#" v-if="canCommenting()" class="comments__item-reply"
                       @click.prevent="activateReplyForm">ответить</a>
                    <div class="comments__item-rating">
                        <i class="far fa-thumbs-down" :class="givenRating()" @click="changeRating()"></i>
                        <span :class="ratingColor">{{ rating_value }}</span>
                        <i class="far fa-thumbs-up" :class="givenRating(1)" @click="changeRating(1)"></i>
                    </div>
                </div>
            </div>
            <div class="comments__item-children--comments" v-if="comment.comments.length !== 0">
                <comment v-for="comment in comment.comments" :key="comment.id" :comment="comment"/>
            </div>
            <div v-if="showForm">
                <CommentForm :parentId="comment.id" ref="commentForm" :comments="comment.comments"
                             @hideForm="showForm = false"/>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
import Comment from "./Comment";
import CommentForm from './CommentForm';
import auth from "../../helpers/auth.js";
import {bus} from '../../bus.js';
import axios from "axios";

export default {
    name: "Comment",
    props: {
        comment: {
            type: Object,
            required: true,
        },
    },
    mixins: [auth],
    components: {
        CommentForm,
        Comment,
    },
    data: function () {
        return {
            now: moment(),
            showForm: false,
            rating_value: 0,
            given_rating: null
        }
    },
    beforeMount() {
        moment.locale('ru');
        this.rating_value = this.comment.rating_value;
        this.given_rating = this.comment.given_rating;
    },
    methods: {
        activateReplyForm() {
            this.$emit('hideReplyForm');
            this.showForm = !this.showForm;
        },
        canCommenting() {
            return (this.authCheck() && this.comment.nesting_level < 3);
        },
        givenRating(type = -1) {
            return (this.given_rating !== null && type === this.given_rating.type ? 'rated' : '');
        },
        changeRating(type = -1) {
            let self = this;
            bus.$emit('showLoading');
            if (this.authCheck()) {
                axios.post(`/comments/${this.comment.id}/rating`, {
                    type: type,
                }).then(response => {
                    self.rating_value = response.data.rating_value;
                    self.given_rating = response.data.given_rating;
                    this.$vs.notification({
                        border: 'success',
                        position: 'top-right',
                        title: 'Ваш голос учтен',
                    });
                    bus.$emit('hideLoading');
                });
            } else {
                bus.$emit('hideLoading');
                this.$vs.notification({
                    border: 'danger',
                    position: 'top-right',
                    title: 'Войдите на сайт',
                    text: 'Чтобы оценивать записи нужно войти в свой аккаунт.' +
                        '<br/>' +
                        '<a href="/login" class="login--button mt-3 d-inline-flex">\n' +
                        '<i class="fab fa-steam"></i>войти\n' +
                        '</a>'
                });
            }
        }
    },
    mounted() {
        let self = this;
        setInterval(function () {
            self.now = moment();
        }, 10000);
        $('[data-toggle="tooltip"]').tooltip();
    },
    computed: {
        created_at() {
            let self = this,
                created_at = moment(self.comment.created_at);
            return moment.duration(created_at.diff(self.now)).humanize(true);
        },
        date_created_at() {
            let self = this,
                created_at = moment(self.comment.created_at);
            return created_at.format('Do MMMM YYYY, HH:mm:ss');
        },
        ratingColor() {
            if (this.rating_value > 0) {
                return 'text-success';
            } else if (this.rating_value < 0) {
                return 'text-danger';
            }
            return '';
        },
    },

}
</script>

<style scoped>

</style>
