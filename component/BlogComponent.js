export const BlogComponent = {
  template: `
                    <div>
                        <h3>{{ blog.title }} <button @click="$emit('selected', blog.title)">Pilih</button></h3>
                        <p>{{ blog.content }}</p>
                    </div>
                `,
  data() {
    return {
      pesan: "Ini dari component blog",
    };
  },
  props: ["blog"],
};
