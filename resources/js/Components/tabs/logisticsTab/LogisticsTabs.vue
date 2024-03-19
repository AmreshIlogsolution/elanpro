<template>
  <v-card class="w-full">
    <v-tabs v-model="tab" bg-color="primary">
      <v-tab density="compact" value="logistics">Logistics</v-tab>
      <v-tab density="compact" value="document_udf">Document UDF</v-tab>
    </v-tabs>

    <v-card-text class="w-full h-full">
      <v-window v-model="tab">
        <v-window-item value="logistics">
          <LogisticForm />
        </v-window-item>

        <v-window-item value="document_udf">Document UDF</v-window-item>
      </v-window>
    </v-card-text>
  </v-card>
</template>

<script setup lang="ts">
import { ref } from "vue";
import LogisticForm from "./LogisticForm.vue";

const tab = ref();
</script>
