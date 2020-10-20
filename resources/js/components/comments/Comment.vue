<template>
    <div class="comments__item">
        <a :href="comment.author.link" class="comments__item-author-avatar">
            <img :src="comment.author.avatar_url" alt="">
        </a>
        <div class="comments__item-body">
            <a :href="comment.author.link" class="comment-author">
                {{ comment.author.personaname }}
            </a>
            <div class="comments__item-text" @click.prevent="(comment.nesting_level < 3 ? activateReplyForm : '')">
                {{ comment.text }}
            </div>
            <div class="comments__item-action">
                <div class="comments__item-create_time">
                    {{ created_at }}
                </div>
                <a href="#" v-if="comment.nesting_level < 3" class="comments__item-reply" @click.prevent="activateReplyForm">ответить</a>
            </div>
            <div class="comments__item-children--comments" v-if="comment.comments.length !== 0">
                <comment v-for="comment in comment.comments" :modelType="modelType" :modelId="modelId" :key="comment.id" :comment="comment"/>
            </div>
            <div v-if="showForm">
                <CommentForm :modelType="modelType" :modelId="modelId" :parentId="comment.id" ref="commentForm" :comments="comment.comments" @hideForm="showForm = false"/>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
import Comment from "./Comment";
import CommentForm from './CommentForm';

export default {
    name: "Comment",
    props: {
        comment: {
            type: Object,
            required: true,
        },
        modelType: {
            type: String,
        },
        modelId: {
            type: String,
        },
    },
    components: {
        CommentForm,
        Comment,
    },
    data: function() {
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
      }
    },
    mounted() {
        let self = this;
        setInterval(function(){
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
