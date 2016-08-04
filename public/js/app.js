var example1 = new Vue({
  el: '#example-1',
  data: {
    names: [
      'ter',
      'foo',
      'bar'
    ]
  },
  methods: {
			addName: function() {
				this.names.push(this.newName);

				this.newName = '';
			}
	}
});


