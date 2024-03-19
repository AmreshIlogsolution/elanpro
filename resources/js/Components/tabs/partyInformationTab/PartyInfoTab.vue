<template>
  <v-card class="w-full">
    <v-tabs v-model="tab" bg-color="primary">
      <v-tab density="compact" value="general">General</v-tab>
      <v-tab density="compact" value="extin">Extin</v-tab>
    </v-tabs>

    <v-card-text class="w-full h-full">
      <v-window v-model="tab">
        <v-window-item value="general">
          <GeneralTab :salesExecutive="salesExecutive" :states="states"/>
        </v-window-item>

        <v-window-item value="extin">Extin</v-window-item>
      </v-window>
    </v-card-text>
  </v-card>
</template>

<script setup lang="ts">
import { ref } from "vue";
import GeneralTab from "./GeneralTab.vue";

const tab = ref();
defineProps({salesExecutive:{
  type: Object,
  required: true
},

states:{
  type:Object,
  required:true
}
})
</script>
