<template>
    <div>
        <h5 class="mb-4">Комментарии ({{ commentsCount }})</h5>
        <div class="comments" ref="comments">
            <div class="comments__list">
                <span v-if="comments.length === 0">Комментариев нет. Будь первым.</span>
                <comment v-else v-for="comment in comments" :key="comment.id" :comment="comment"/>
            </div>
        </div>
        <CommentForm v-if="authCheck()" :comments="comments" :focus="false"/>
    </div>
</template>

<script>
    import Comment from "./Comment";
    import CommentForm from "./CommentForm";
    import { bus } from '../../bus.js';
    import axios from "axios";
    import auth from "../../helpers/auth.js";

    export default {
        name: 'Comments',
        data: function () {
            return {
                comments: [],
                commentsCount: 0,
                loading: null,
            }
        },
        mixins: [auth],
        components: {
            Comment,
            CommentForm
        },
        mounted() {
            let self = this;
            bus.$on('countCommentUpdate', function(commentsCount) {
                self.commentsCount = commentsCount;
            }).$on('showLoading', function() {
                self.loading = self.$vs.loading({
                    target: self.$refs.comments
                })
            }).$on('hideLoading', function() {
                self.loading.close();
            });
            axios.get(`${window.location.pathname}/comments`)
                .then(response => {
                    this.comments = response.data.comments;
                    this.commentsCount = response.data.commentsCount;
                });
        },
    }
</script>
