<template>
    <div>
        <h5 class="mb-4">Комментарии ({{ commentsCount }})</h5>
        <div class="comments">
            <div class="comments__list">
                <span v-if="comments.length === 0">Комментариев нет. Будь первым.</span>
                <comment v-else v-for="comment in comments" :key="comment.id" :comment="comment"/>
            </div>
        </div>
        <CommentForm :comments="comments" :focus="false"/>
    </div>
</template>

<script>
    import Comment from "./Comment";
    import CommentForm from "./CommentForm";
    import axios from "axios";
    import { bus } from '../../bus.js';

    export default {
        name: 'Comments',
        data: function () {
            return {
                comments: [],
                commentsCount: 0,
            }
        },
        components: {
            Comment,
            CommentForm
        },
        mounted() {
            let self = this;
            bus.$on('countCommentUpdate', function(commentsCount) {
                self.commentsCount = commentsCount;
            });
            axios.get(`${window.location.pathname}/comments`)
                .then(response => {
                    this.comments = response.data.comments;
                    this.commentsCount = response.data.commentsCount;
                });
        },
    }
</script>
