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
                    <div class="comments__item-create_time">
                        {{ created_at }}
                    </div>
                    <a href="#" v-if="canCommenting()" class="comments__item-reply"
                       @click.prevent="activateReplyForm">ответить</a>
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
        }
    },
    beforeMount() {
        moment.locale('ru');
    },
    methods: {
        activateReplyForm() {
            this.$emit('hideReplyForm');
            this.showForm = !this.showForm;
        },
        canCommenting() {
            return (this.authCheck() && this.comment.nesting_level < 3);
        }
    },
    mounted() {
        let self = this;
        setInterval(function () {
            self.now = moment();
        }, 10000);
    },
    computed: {
        created_at() {
            let self = this,
                created_at = moment(self.comment.created_at);
            return moment.duration(created_at.diff(self.now)).humanize(true);
        },
    },

}
</script>

<style scoped>

</style>
