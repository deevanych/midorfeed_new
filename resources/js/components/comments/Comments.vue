<template>
    <div>
        <h5>Комментарии ({{ comments.length }})</h5>
        <div class="comments">
            <form class="comments__add-form" @submit.prevent="sendComment">
                <textarea class="comment__text-input" v-model="text"></textarea>
                <vs-button circle>Отправить</vs-button>
            </form>
            <div class="divider"></div>
            <div class="comments__list">
                <span v-if="comments.length === 0">Комментариев нет. Будь первым.</span>
                <comment v-else v-for="comment in comments" :key="comment.id" :comment="comment"/>
            </div>
        </div>
    </div>
</template>

<script>
import Comment from "./Comment";
export default {
    name: 'Comments',
    data: function() {
        return {
            text: '',
        }
    },
    components: {
        Comment
    },
    props: {
        comments: {
            type: Array,
        }
    },
    methods: {
        sendComment() {
            this.comments.push({text: this.text});
            this.text = '';
        }
    }
}
</script>
