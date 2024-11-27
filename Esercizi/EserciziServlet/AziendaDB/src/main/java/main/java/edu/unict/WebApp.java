package main.java.edu.unict;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/azienda")
public class WebApp extends HttpServlet {
    private Connection connection;
    private static final String CONNECTION_STRING = "jdbc:mysql://localhost:3306/AziendaDB?user=root&password=Giulio2002!";

    @Override
    public void init() {
        try {
            connection = DriverManager.getConnection(CONNECTION_STRING);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><center><h1>Azienda JDBC</h1></center><br>");
        out.println("<body><h1>Lista dei dipendenti:</h1>");

        String query = "SELECT * FROM Dipendenti";
        try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {

            while (result.next()) {
                out.println("<form action='/azienda' method='post'>");

                out.println("<input type='submit' name='richiesta' value='Elimina'>");
                out.println("<input type='submit' name='richiesta' value='Modifica'>");

                out.println("<input type='hidden' name='id' value='" + result.getInt("ID_Dipendente") + "'>");
                out.println("Nome: " + result.getString("Nome"));
                out.println("Cognome: " + result.getString("Cognome"));
                out.println("Età: " + result.getString("Età"));
                out.println("Ruolo: " + result.getString("Ruolo"));
                out.println("Stipendio: " + result.getString("Stipendio"));
                out.println("Reparto: " + result.getString("Reparto"));

                out.println("</form>");

            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        out.println("<br><h1>Aggiungi un nuovo dipendente</h1>");
        out.println("<form action='/azienda' method='post'>");
        out.println("<input type='text' name='Nome' placeholder='Inserire nome' required>");
        out.println("<input type='text' name='Cognome' placeholder='Inserire cognome' required>");
        out.println("<input type='number' name='Eta' placeholder='Eta' required>");
        out.println("<input type='text' name='Ruolo' placeholder='Inserire ruolo' required>");
        out.println("<input type='number' name='Stipendio' placeholder='Inserire stipendio' required>");
        out.println("<input type='text' name='Reparto' placeholder='Inserire reparto' required>");
        out.println("<input type='submit' name='richiesta' value='Invia'>");
        out.println("</form>");
        out.println("</body></html>");
    }

    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String richiesta = request.getParameter("richiesta");

        // Create
        if (richiesta.equals("Invia")) {

            String nome = request.getParameter("Nome");
            String cognome = request.getParameter("Cognome");
            String ruolo = request.getParameter("Ruolo");
            int stipendio;

            try {
                stipendio = Integer.parseInt(request.getParameter("Stipendio"));
            } catch (NumberFormatException e) {
                out.write("Errore: Stipendio deve essere un numero intero.");
                return;
            }

            String query = "INSERT INTO Dipendenti (Nome, Cognome, Ruolo, Stipendio) VALUES (?, ?, ?, ?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, cognome);
                stmt.setString(3, ruolo);
                stmt.setInt(4, stipendio);

                int rows = stmt.executeUpdate();
                out.write("Dipendente aggiunto con successo. Righe modificate: " + rows);
            } catch (Exception e) {
                out.write("Errore durante l'inserimento del dipendente.");
                e.printStackTrace();
            }

            out.write("<br><a href='/azienda'>Torna alla Home</a>");
        }

        // Delete
        else if (richiesta.equals("Elimina")) {
            String id_da_eliiminare = request.getParameter("id");

            String query = "DELETE FROM Dipendenti WHERE ID_Dipendente = ?;";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, id_da_eliiminare);
                int rows = stmt.executeUpdate();
                out.write("Dipendente aggiunto con successo. Righe modificate: " + rows);
            } catch (Exception e) {
                out.write("Errore durante l'inserimento del dipendente.");
                e.printStackTrace();
            }

            out.write("<br><a href='/azienda'>Torna alla Home</a>");

        }

        // Update 1
        else if (richiesta.equals("Modifica")) {
            String id_da_modificare = request.getParameter("id");

            String query = "SELECT * FROM Dipendenti WHERE ID_Dipendente = ?;";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, id_da_modificare);
                ResultSet result = stmt.executeQuery();

                if (result.next()) {
                    String nome = result.getString("Nome");
                    String cognome = result.getString("Cognome");
                    int eta = result.getInt("Età");
                    String ruolo = result.getString("Ruolo");
                    int stipendio = result.getInt("Stipendio");
                    String reparto = result.getString("Reparto");

                    out.println("<br><h1>Modifica il dipendente</h1>");
                    out.println("<form action='/azienda' method='post'>");
                    out.println("<input type='hidden' name='id' value='" + id_da_modificare + "'>");
                    out.println("<input type='text' name='Nome' placeholder='Inserire nome' value='" + nome + "'>");
                    out.println("<input type='text' name='Cognome' placeholder='Inserire cognome' value='" + cognome
                            + "'>");
                    out.println("<input type='number' name='Eta' placeholder='Eta' value='" + eta + "'>");
                    out.println("<input type='text' name='Ruolo' placeholder='Inserire ruolo' value='" + ruolo + "'>");
                    out.println("<input type='number' name='Stipendio' placeholder='Inserire stipendio' value='"
                            + stipendio + "'>");
                    out.println("<input type='text' name='Reparto' placeholder='Inserire reparto' value='" + reparto
                            + "'>");
                    out.println("<input type='submit' name='richiesta' value='Update'>");
                    out.println("</form>");
                    out.println("</body></html>");
                } else {
                    out.println("Errore: Dipendente non trovato.");
                }

            } catch (SQLException e) {
                e.printStackTrace();
                out.println("Errore durante la modifica del dipendente.");
            }
        }

        // Update 2
        else if (richiesta.equals("Update")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String nome = request.getParameter("Nome");
            String cognome = request.getParameter("Cognome");
            int eta = Integer.parseInt(request.getParameter("Eta"));
            String ruolo = request.getParameter("Ruolo");
            int stipendio = Integer.parseInt(request.getParameter("Stipendio"));
            String reparto = request.getParameter("Reparto");

            String query = "UPDATE Dipendenti SET Nome=?, Cognome=?, Età=?, Ruolo=?, Stipendio=?, Reparto=? WHERE ID_Dipendente = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, cognome);
                stmt.setInt(3, eta);
                stmt.setString(4, ruolo);
                stmt.setInt(5, stipendio);
                stmt.setString(6, reparto);
                stmt.setInt(7, id);

                int rows = stmt.executeUpdate();
                out.write("Dipendente modificato con successo. Righe modificate: " + rows);

            } catch (SQLException e) {
                out.write("Errore durante la modifica del dipendente.");
                e.printStackTrace();
            }

            out.write("<br><a href='/azienda'>Torna alla Home</a>");

        }
    }

    @Override
    public void destroy() {
        try {
            if (connection != null && !connection.isClosed()) {
                connection.close();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}