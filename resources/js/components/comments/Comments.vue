<template>
    <div>
        <h5 class="mb-4">Комментарии ({{ selfComments.length }})</h5>
        <div class="comments">
            <div class="comments__list">
                <span v-if="selfComments.length === 0">Комментариев нет. Будь первым.</span>
                <comment v-else v-for="comment in selfComments" :key="comment.id" :comment="comment"/>
            </div>
            <form class="comments__add-form" @submit.prevent="sendComment">
                <textarea class="comment__text-input" v-model="text"></textarea>
                <vs-button circle>Отправить</vs-button>
            </form>
        </div>
    </div>
</template>

<script>
    import Comment from "./Comment";
    import axios from 'axios';

    export default {
        name: 'Comments',
        data: function () {
            return {
                text: '',
                selfComments: Array,
            }
        },
        components: {
            Comment
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
        methods: {
            sendComment() {
                let self = this;
                axios.post('/comments', {
                    modelType: self.modelType,
                    modelId: self.modelId,
                    text: self.text,
                })
                    .then(response => {
                        self.selfComments.push(response.data);
                        this.text = '';
                    });
            }
        },
    }
</script>
