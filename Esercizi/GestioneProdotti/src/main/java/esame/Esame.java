package esame;

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

@WebServlet("/prodotti")
public class Esame extends HttpServlet {

    private Connection connection;

    public void init() {
        final String connectionString = "jdbc:mysql://localhost:3306/GestioneProdotti";
        final String username = "root";
        final String password = "Giulio2002!";

        try {
            connection = DriverManager.getConnection(connectionString, username, password);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("""
                    <html>
                        <head>
                            <title> Gestione Prodotti </title>
                        </head>
                        <body>
                            <h1> <central> Gestione Prodotti in JDBC </center> </h1>
                """);

        String query = "SELECT * FROM Prodotti";

        out.println("<h3> Lista Prodotti </h3>");

        try (PreparedStatement stmt = connection.prepareStatement(query)) {
            ResultSet result = stmt.executeQuery();

            while (result.next()) {
                out.println("<form action='/prodotti' method='post'>");
                out.println("<input type='hidden' name='id' value = '" + result.getInt("id") + "'>");
                out.println("<input type='hidden' name='nome' value = '" + result.getString("nome_prodotto") + "'>");
                out.println(
                        "<input type='hidden' name='prezzo' value = '" + result.getString("prezzo_prodotto") + "'>");

                out.println("<br>");
                out.println("<input type='submit' name='action' value='Elimina'>");
                out.println("<input type='submit' name='action' value='Modifica'>");
                out.println("<span> <b> Nome </b>: " + result.getString("nome_prodotto"));
                out.println("<span> <b> Prezzo </b>: " + result.getString("prezzo_prodotto"));
                out.println("</form>");

            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        out.println("<h3> Inserisci un nuovo prodotto </h3>");

        out.println("<form action='/prodotti' method='post'>");
        out.println("<span> Inserisci nome prodotto: </span>");
        out.println("<input type='text' name='nome' placeholder='Inserisci nome prodotto'> <br/>");
        out.println("<span> Inserisci prezzo prodotto: </span>");
        out.println("<input type='number' name='prezzo' placeholder='Inserisci prezzo prodotto'> <br/>");
        out.println("<input type='submit' name='action' value='Invia'> <br/>");
        out.println("</form>");
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String action = request.getParameter("action");

        if (action.equals("Invia")) {
            String nome = request.getParameter("nome");
            int prezzo = Integer.parseInt(request.getParameter("prezzo"));

            String query = "INSERT INTO Prodotti (nome_prodotto, prezzo_prodotto) VALUES (?,?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setInt(2, prezzo);

                int rows = stmt.executeUpdate();
                out.println("Insetrimento avvenuto con successo! Righe modificate:" + rows);
            } catch (SQLException e) {
                out.println("Errore durante l'inserimento del prodotto.");
                e.printStackTrace();
            }

            out.println("<a href='/prodotti'> Torna alla Home </a>");

        }

        if (action.equals("Elimina")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "DELETE FROM Prodotti WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setInt(1, id);

                int rows = stmt.executeUpdate();
                out.println("Eliminazione avvenuta con successo! Righe modificate: " + rows);
            } catch (SQLException e) {
                out.println("Cancellazione non riuscita");
                e.printStackTrace();
            }

            out.println("<a href='/prodotti'> Torna alla Home </a>");

        }

        if (action.equals("Modifica")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String nome = request.getParameter("nome");
            int prezzo = Integer.parseInt(request.getParameter("prezzo"));

            out.println("<h3> Modifica prodotto esistente </h3>");

            out.println("<form action='/prodotti' method='post'>");
            out.println("<input type='hidden' name='id' value = '" + id + "'>");
            out.println("<span> Modifica nome prodotto: </span>");
            out.println("<input type='text' name='nome' value='" + nome + "'> <br/>");
            out.println("<span> Modifica prezzo prodotto: </span>");
            out.println("<input type='number' name='prezzo' value='" + prezzo + "'> <br/>");
            out.println("<input type='submit' name='action' value='Update'> <br/>");
            out.println("</form>");
        }

        if (action.equals("Update")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String nome = request.getParameter("nome");
            int prezzo = Integer.parseInt(request.getParameter("prezzo"));

            String query = "UPDATE Prodotti SET nome_prodotto = ?, prezzo_prodotto=? WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setInt(2, prezzo);
                stmt.setInt(3, id);

                int rows = stmt.executeUpdate();
                out.println("Modifica avvenuta con successo! Righe modificate: " + rows);
            } catch (SQLException e) {
                out.println("Modifica non riuscita");
                e.printStackTrace();
            }

            out.println("<a href='/prodotti'> Torna alla Home </a>");
        }

    }

    public void destroy() {
        try {
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

}
