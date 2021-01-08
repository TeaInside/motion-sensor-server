

window.onload = function () {
  let mainData = gid("tableData");

  function getTableData(cb) {
    let ch = new XMLHttpRequest;
    ch.withCredentials = true;
    ch.onload = function () {
      let json = JSON.parse(this.responseText),
          table = gid("tableData"),
          r = '<tr><th>ID</th><th>Device</th><th>Datetime</th></tr>',
          i;
      for (i in json) {
        r +=
          '<tr>'+
            '<td>'+json[i].motion_id+'</td>'+
            '<td>'+json[i].name+'</td>'+
            '<td>'+json[i].created_at+'</td>'+
          '</tr>';
      }
      table.innerHTML = r;
      setTimeout(cb, 500);
    };
    ch.open("GET", "home.php?action=get_table_data");
    ch.send(null);
  }

  let rec = function () {
    getTableData(rec);
  }
  rec();
};
