<div class="wrap">
  <h2>MD Things</h2>
  <form action="options.php" method="post">
    <?php settings_fields('md_things_plugin');?>
    <?php $options=get_option('md_things_plugin');?>
    <div class="description">Tell WordPress how many things you've got.</div>
    <table class="form-table">
      <tr>
        <th scope="row">Number of things</th>
        <td><input type="tel" name="md_things_plugin[mythings]" value="<?=esc_attr($options['mythings'])?>"></td>
      </tr>
    </table>
    <?php submit_button();?>
  </form>
</div>