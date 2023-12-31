// fetch currency names
const apiKeyCurr = apiKeyCurrency;
const endpoint = "https://open.er-api.com/v6/latest";

// Currency dropdown elements
const fromCurrencyDropdown = document.getElementById("from_currency");
const toCurrencyDropdown = document.getElementById("to_currency");

// Fetch currency names
fetch(`${endpoint}?apikey=${apiKeyCurr}`)
    .then(response => response.json())
    .then(data => {
        // Extract currency names from the API response
        const currencies = Object.keys(data.rates);

        // Set default currencies
        const defaultFromCurrency = "USD"; // Change this to your desired default "From" currency
        const defaultToCurrency = "ILS"; // Change this to your desired default "To" currency

        // Populate the "From" dropdown with currency names
        currencies.forEach(currency => {
            const option = document.createElement("option");
            option.value = currency;
            option.textContent = currency;

            // Set the default "From" currency
            if (currency === defaultFromCurrency) {
                option.selected = true;
            }

            fromCurrencyDropdown.appendChild(option);
        });

        // Populate the "To" dropdown with currency names
        currencies.forEach(currency => {
            const option = document.createElement("option");
            option.value = currency;
            option.textContent = currency;

            // Set the default "To" currency
            if (currency === defaultToCurrency) {
                option.selected = true;
            }

            toCurrencyDropdown.appendChild(option);
        });
    })
    .catch(error => console.error("Error fetching currency names:", error));

//perform the exchange
var api = apiKeyRate;
var from_currency = null;
var to_currency = null;
var forex_dps = [];
var forex_data1 = [];
var chart = null;
var forex_columns = ["Date", "Open", "High", "Low", "Close"];

function forex_download() {
    window.location =
        "https://www.alphavantage.co/query?function=FX_DAILY&from_symbol=" +
        from_currency +
        "&to_symbol=" +
        to_currency +
        "&apikey=" +
        api +
        "&datatype=csv";
}

function getForexTable() {
    console.log(forex_data1);
    var table_container = document.getElementById("table_container");
    var para = document.createElement("p");
    para.id = "para";
    var cell = document.createTextNode("RECENT DATA");
    para.appendChild(cell);
    table_container.appendChild(para);
    var table = document.createElement("table");
    table.className = "table";
    var row = document.createElement("tr");
    for (let i = 0; i < forex_columns.length; i++) {
        var col = document.createElement("th");
        col.scope = "col";
        cell = document.createTextNode(forex_columns[i]);
        console.log(cell);
        col.appendChild(cell);
        row.appendChild(col);
    }
    table.appendChild(row);
    for (let i = 0; i < 7 && i < forex_data1.length; i++) {
        row = document.createElement("tr");
        for (let j = 0; j < 5 && j < forex_data1[i].length; j++) {
            col = document.createElement("td");
            console.log("hello");

            // Check if forex_data1[i] and forex_data1[i][j] are defined before using them
            if (
                forex_data1[i] &&
                forex_data1[i][j] !== undefined &&
                forex_data1[i][j] !== null
            ) {
                cell = document.createTextNode(forex_data1[i][j]);
                col.appendChild(cell);
                row.appendChild(col);
            } else {
                // If the data is not defined, you can add a placeholder or handle it as needed
                cell = document.createTextNode("N/A");
                col.appendChild(cell);
                row.appendChild(col);
            }
        }
        table.appendChild(row);
    }

    table_container.appendChild(table);
    console.log(forex_data1);
}

function getGraph() {
    chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "From " + from_currency + " To " + to_currency
        },
        animationEnabled: true,
        theme: "light2",
        axisY: {
            title: "Open Prices",
            includeZero: false
        },
        axisX: {
            title: "Date",
            valueFormatString: "DD-MMM"
        },
        data: [
            {
                type: "line",
                indexLabelFontSize: 16,
                dataPoints: forex_dps
            }
        ]
    });
    chart.options.data[0].dataPoints = forex_dps;
    chart.render();
}

function getGraphData() {
    $.getJSON(
        "https://www.alphavantage.co/query?function=FX_DAILY&from_symbol=" +
            from_currency +
            "&to_symbol=" +
            to_currency +
            "&outputsize=full&apikey=" +
            api
    )
        .done(function(data) {
            console.log(data);
            var date = data["Time Series FX (Daily)"];
            let a = 20;
            let b = 7;
            for (var d in date) {
                var r = d.split("-");
                if (a-- > 0) {
                    var value = date[d];
                    forex_dps.unshift({
                        x: new Date(
                            parseInt(r[0]),
                            parseInt(r[1]) - 1,
                            parseInt(r[2])
                        ),
                        y: parseFloat(value["1. open"])
                    });
                    if (b-- > 0) {
                        let c = [
                            d,
                            value["1. open"],
                            value["2. high"],
                            value["3. low"],
                            value["4. close"]
                        ];
                        forex_data1.push(c);
                    }
                } else {
                    break;
                }
            }
            getGraph();
            getForexTable();
            document.getElementById("loading_container").style.display = "none";
            document.getElementById("download_data").style.display = "block";
            document.getElementById("from_currency").disabled = false;
            document.getElementById("to_currency").disabled = false;
            document.getElementById("get_data").disabled = false;
        })
        .fail(function(textStatus, error) {
            alert(textStatus + " " + error + "\nReload the page");
        });
}

function getForexExchangeData() {
    $.getJSON(
        "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=" +
            from_currency +
            "&to_currency=" +
            to_currency +
            "&apikey=" +
            api
    )
        .done(function(data) {
            var ex = data["Realtime Currency Exchange Rate"];
            var div = document.getElementById("exchange");
            for (var d in ex) {
                var h6 = document.createElement("h6");
                var cell = document.createTextNode(d + " : " + ex[d]);
                h6.appendChild(cell);
                div.appendChild(h6);
            }
            getGraphData();
        })
        .fail(function(textStatus, error) {
            alert(textStatus + " " + error + "\nReload the page");
        });
}

function getData() {
    if (chart !== null) {
        chart.destroy();
    }
    forex_data1 = [];
    forex_dps = [];
    document.getElementById("table_container").innerHTML = "";
    document.getElementById("exchange").innerHTML = "";
    from_currency = document.getElementById("from_currency").value;
    to_currency = document.getElementById("to_currency").value;
    document.getElementById("loading_container").style.display = "block";
    document.getElementById("download_data").style.display = "none";
    document.getElementById("from_currency").disabled = true;
    document.getElementById("to_currency").disabled = true;
    document.getElementById("get_data").disabled = true;
    getForexExchangeData();
}
