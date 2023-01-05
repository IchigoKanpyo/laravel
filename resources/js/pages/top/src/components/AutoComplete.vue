<template>
  <t-input type="text" ref="autocomplete" />
</template>

<script>
import $ from "jquery";
import "jquery-ui/ui/widgets/autocomplete";
export default {
  mounted() {
    const targetElement = this.$el;
    $(targetElement).autocomplete({
      source: ["c++", "java", "php", "coldfusion", "javascript", "asp", "ruby"],
    });
  },
};
</script>

<style>
</style>