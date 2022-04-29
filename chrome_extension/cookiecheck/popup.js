// JavaScript Table generation code courtesy of Valentino Gagliardi,
// https://www.valentinog.com/blog/html-table/

function generateTableHead(table, data) {
    let thead = table.createTHead();
    let row = thead.insertRow();
    for (let key of data) {
        let th = document.createElement("th");
        let text = document.createTextNode(key);
        th.appendChild(text);
        row.appendChild(th);
    }
}

function generateTable(table, data) {
    for (let element of data) {
        let row = table.insertRow();
        for (key in element) {
            let cell = row.insertCell();
            let text = document.createTextNode(element[key]);
            cell.appendChild(text);
        }
    }
}

function listUnspecifiedSameSite() {
    chrome.cookies.getAll({}, function (cookie) {
        var unspecifiedCookies = [];
        for (i = 0; i < cookie.length; i++) {
            if (cookie[i].sameSite === "unspecified") {
                var c = {Domain:cookie[i].domain, Name:cookie[i].name, Value:cookie[i].value, Path: cookie[i].path, SameSite: cookie[i].sameSite, Secure:cookie[i].secure};
                unspecifiedCookies.push(c);
                console.log(JSON.stringify(c));
            }
        }
        let table = document.querySelector("table");
        let data = Object.keys(unspecifiedCookies[0]);
        generateTable(table, unspecifiedCookies);
        generateTableHead(table, data);
    });
}

window.onload=listUnspecifiedSameSite;

(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);