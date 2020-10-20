<template>
    <form class="comments__add-form" @submit.prevent="sendComment">
        <textarea class="comment__text-input" v-model="text" v-focus></textarea>
        <span class="comment__add-form--error" v-if="error">{{ error }}</span>
        <vs-button circle>Отправить</vs-button>
    </form>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "CommentForm",
        data: function () {
            return {
                text: '',
                error: ''
            }
        },
        props: {
            modelType: {
                type: String,
                required: true,
            },
            modelId: {
                type: String,
                required: true,
            },
            parentId: {
                type: Number,
                default: null,
            },
            comments: {
                type: Array,
            }
        },
        directives: {
            focus: {
                // определение директивы
                inserted: function (el) {
                    el.focus()
                }
            }
        },
        methods: {
            sendComment() {
                let self = this;
                axios.post('/comments', {
                    modelType: self.modelType,
                    modelId: self.modelId,
                    text: self.text,
                    parentId: self.parentId,
                })
                    .then(response => {
                        this.$emit('hideForm');
                        this.comments.push(response.data);
                        this.text = '';
                    })
                    .catch(error => {
                        this.error = error.response.data.errors.text[0];
                    });
            }
        },
    }
</script>

<style scoped>

</style>
