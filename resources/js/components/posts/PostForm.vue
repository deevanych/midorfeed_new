<template>
    <div v-if="authCheck()" class="rounded shadow p-4">
        <div class="post__add-block">
            <div class="row">
                <div class="col-auto pr-0">
                    <a :href="$store.getters.getAuthUser.link" class="post__author-avatar">
                        <img :src="$store.getters.getAuthUser.avatar_url" alt="">
                    </a>
                </div>
                <div class="col">
                    <form class="post__add-form row">
                        <div contenteditable="true" data-ph="Введите текст .." class="col post__text"></div>
                        <div class="col-auto pr-0">
                            <vs-button
                                icon
                                color="#777"
                                flat
                            >
                                <i class="fas fa-camera"></i>
                            </vs-button>
                        </div>
                        <div class="col-auto pr-0">
                            <vs-button
                                icon
                                color="#777"
                                flat
                            >
                                <i class="fab fa-youtube"></i>
                            </vs-button>
                        </div>
                        <div class="col-auto">
                            <vs-button
                                icon
                                color="#777"
                                flat
                            >
                                <i class="fas fa-gamepad"></i>
                            </vs-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import auth from "../../helpers/auth.js";

export default {
    name: "PostForm",
    mixins: [auth],
    data: function () {
        return {
            text: null,
        }
    },
}
</script>

<style scoped>

</style>
