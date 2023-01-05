<template>
  <div>
    <h1>aa</h1>
    <auto-complete />
    <date-time-picker />
    <t-select
      multiple
      :value="['a']"
      :close-on-select="false"
      :options="['a', 'b', 'c']"
      hideSearchBox
      :readonly="true"
    />
  </div>
</template>

<script>
import AutoComplete from "./components/AutoComplete";
import DateTimePicker from "./components/DateTimePicker.vue";
import "../../../jquery.datetimepicker.min.js";
export default {
  components: { AutoComplete, DateTimePicker },
  mounted() {},
};
</script>

<style>
</style>