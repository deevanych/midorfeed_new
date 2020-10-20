<template>
    <div>
        <h5 class="mb-4">Комментарии ({{ selfComments.length }})</h5>
        <div class="comments">
            <div class="comments__list">
                <span v-if="selfComments.length === 0">Комментариев нет. Будь первым.</span>
                <comment v-else v-for="comment in selfComments" :modelType="modelType" :modelId="modelId" :key="comment.id" :comment="comment"/>
            </div>
        </div>
        <CommentForm :modelType="modelType" :modelId="modelId" :comments="comments"/>
    </div>
</template>

<script>
    import Comment from "./Comment";
    import CommentForm from "./CommentForm";

    export default {
        name: 'Comments',
        data: function () {
            return {
                selfComments: Array,
            }
        },
        components: {
            Comment,
            CommentForm
        },
        props: {
            comments: {
                type: Array,
            },
            modelType: {
                type: String,
            },
            modelId: {
                type: String,
            },
        },
        mounted() {
            this.selfComments = this.comments;
        },
    }
</script>
