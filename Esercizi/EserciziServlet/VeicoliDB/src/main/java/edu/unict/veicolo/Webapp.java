package edu.unict.veicolo;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/veicoli")
public class Webapp extends HttpServlet {

    private Connection connection;

    @Override
    public void init() {
        // final String CONNECTION_STRING =
        // "jdbc:mysql://localhost:3306/VehicleDB?user=root&password=Gulio2002!";
        final String CONNECTION_STRING = "jdbc:mysql://localhost:3306/VehicleDB";
        final String username = "root";
        final String password = "Giulio2002!";

        try {
            connection = DriverManager.getConnection(CONNECTION_STRING, username, password);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("""
                    <html>
                        <head>
                            <title> Veicoli DB </title>
                        </head>
                        <body>
                            <h1> <center> Database di Veicoli </center> </h1>
                """);

        String query = "SELECT * FROM Auto";

        out.println("<h3> Catalogo auto disponibili: </h3>");

        try (PreparedStatement stmt = connection.prepareStatement(query); ResultSet result = stmt.executeQuery()) {

            while (result.next()) {
                out.println("<form action='/veicoli' method='post'>");
                out.println("<input type='hidden' name='Id' value='" + result.getString("ID_Auto") + "'>");
                out.println("<input type='hidden' name='Marca' value='" + result.getString("Marca") + "'>");
                out.println("<input type='hidden' name='Modello' value='" + result.getString("Modello") + "'>");
                out.println("<input type='hidden' name='Anno' value='" + result.getString("Anno") + "'>");
                out.println("<input type='hidden' name='Cilindrata' value='" + result.getString("Cilindrata") + "'>");
                out.println(
                        "<input type='hidden' name='Alimentazione' value='" + result.getString("Alimentazione") + "'>");
                out.println("<input type='hidden' name='Prezzo' value='" + result.getString("prezzo") + "'>");

                out.println("<input type='submit' name='action' value='Elimina'>");
                out.println("<input type='submit' name='action' value='Modifica'>");
                out.println("<span> <b> Marca: </b> " + result.getString("Marca") + "</span>");
                out.println("<span> <b> Modello: </b>" + result.getString("Modello") + "</span>");
                out.println("<span> <b> Anno: </b>" + result.getInt("Anno") + "</span>");
                out.println("<span> <b> Cilindrata: </b>" + result.getInt("Cilindrata") + "</span>");
                out.println("<span> <b> Alimentazione: </b>" + result.getString("Alimentazione") + "</span>");
                out.println("<span> <b> Prezzo: </b>" + result.getFloat("Prezzo") + "</span>");
                out.println("<br/>");
                out.println("</form>");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        out.println("<h3> Inserisci una nuova auto: </h3>");

        out.println("""
                    <form action="/veicoli" method="post">
                        <span> Nome Marca: </span>
                        <input type="text" name="Marca" placeholder="Inserisci nome Marca" required> <br>
                        <span> Nome Modello: </span>
                        <input type="text" name="Modello" placeholder="Inserisci nome Modello" required> <br>
                        <span> Anno: </span>
                        <input type="number" name="Anno" placeholder="Inserisci Anno" required> <br>
                        <span> Cilindrata: </span>
                        <input type="number" name="Cilindrata" placeholder="Inserisci Cilindrata" required> <br>
                        <span> Alimentazione: </span>
                        <select name="Alimentazione" required>
                            <option value="Benzina"> Benzina </option>
                            <option value="Diesel"> Diesel </option>
                            <option value="Elettrico"> Elettrico </option>
                            <option value="Ibrido"> Ibrido </option>
                            <option value="GPL"> GPL </option>
                            <option value="Metano"> Metano </option>
                        </select>
                        <br> <span> Prezzo: </span>
                        <input type="number" name="Prezzo" placeholder="Inserisci Prezzo" required>
                        <input type="submit" name="action" value="Invia">
                    </form>
                """);

        out.println("</body> </html>");

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String operazione = request.getParameter("action");

        switch (operazione) {
            // Post
            case "Invia": {
                String Marca = request.getParameter("Marca");
                String Modello = request.getParameter("Modello");
                int Anno = Integer.parseInt(request.getParameter("Anno"));
                int Cilindrata = Integer.parseInt(request.getParameter("Cilindrata"));
                String Alimentazione = request.getParameter("Alimentazione");
                int Prezzo = Integer.parseInt(request.getParameter("Prezzo"));

                String query = "INSERT INTO Auto (Marca, Modello, Anno, Cilindrata, Alimentazione, Prezzo) VALUES (?, ?, ?, ?, ?, ?)";

                try (PreparedStatement stmt = connection.prepareStatement(query)) {
                    stmt.setString(1, Marca);
                    stmt.setString(2, Modello);
                    stmt.setInt(3, Anno);
                    stmt.setInt(4, Cilindrata);
                    stmt.setString(5, Alimentazione);
                    stmt.setInt(6, Prezzo);

                    int rows = stmt.executeUpdate();

                    out.println("L'inserimento è stata eseguito con successo. Righe aggiunte: " + rows);
                } catch (SQLException e) {
                    out.println("Inserimento non riuscito");
                    e.printStackTrace();
                }

                out.println("<br/> <a href='/veicoli'> Torna alla Home </a>");

                break;
            }
            // Delete
            case "Elimina": {
                int id = Integer.parseInt(request.getParameter("Id"));

                // System.out.println("Id: " + id);

                String query2 = "DELETE FROM Auto WHERE ID_Auto = ?";

                try {
                    PreparedStatement stmt = connection.prepareStatement(query2);
                    stmt.setInt(1, id);
                    int rows = stmt.executeUpdate();
                    out.println("La cancellazione è stata eseguita con successo. Righe rimosse: " + rows);

                } catch (SQLException e) {
                    out.println("Cancellazione non riuscita");
                    e.printStackTrace();
                }

                out.println("<br/> <a href='/veicoli'> Torna alla Home </a>");
                break;
            }
            // Update
            case "Modifica": {
                int id = Integer.parseInt(request.getParameter("Id"));
                int Cilindrata = Integer.parseInt(request.getParameter("Cilindrata"));

                out.print("<h1> Modifica la cilindrata del veicolo </h1>");

                out.print("<form action='/veicoli' method='post'>");
                out.println("<input type='hidden' name='Id' value='" + id + "'>");
                out.print("<span> Cilindrata: </span>");
                out.print("<input type='number' name='Cilindrata' value='" + Cilindrata + "'>");
                out.print("<input type='submit' name='action' value='Update'>");

                out.print("</form>");

                break;
            }
            case "Update": {
                int id = Integer.parseInt(request.getParameter("Id"));
                int Cilindrata = Integer.parseInt(request.getParameter("Cilindrata"));

                String query = "UPDATE Auto SET Cilindrata=? WHERE ID_Auto=?";
                try (PreparedStatement stmt = connection.prepareStatement(query)) {
                    stmt.setInt(1, Cilindrata);
                    stmt.setInt(2, id);
                    int rows = stmt.executeUpdate();
                    out.println("La modifica è stata eseguita con successo. Righe aggiornate: " + rows);

                } catch (SQLException e) {
                    out.println("Modifica non riuscita");
                    e.printStackTrace();
                }

                out.println("<br/> <a href='/veicoli'> Torna alla Home </a>");

                break;
            }
            default:
                break;
        }
    }

    @Override
    public void destroy() {
        try {
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

}
