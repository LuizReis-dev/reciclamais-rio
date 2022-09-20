package dao;

import api.RelatorioBonificacao;
import java.util.List;
import entidades.Catador;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class CatadorDao {

    public static List<Catador> getCatadores(int inicio, int total) {
        List<Catador> list = new ArrayList<Catador>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT id, nome, data_de_nascimento, cpf FROM catador ORDER BY id LIMIT " + (inicio - 1) + ", " + total);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Catador catador = new Catador();
                catador.setId(rs.getInt("id"));
                catador.setNome(rs.getString("nome"));
                catador.setData_de_nascimento(rs.getDate("data_de_nascimento"));
                catador.setCpf(rs.getString("cpf"));
                list.add(catador);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }

    public static List<RelatorioBonificacao> getCatadoresBonificar() {
        List<RelatorioBonificacao> list = new ArrayList<RelatorioBonificacao>();
        List<RelatorioBonificacao> listCatadoresBonificar = new ArrayList<RelatorioBonificacao>();

        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT operacao_comercial.id_catador, materias_em_op.id_material, catador.nome as nome_catador, SUM(materias_em_op.total_em_kg) as total_vendido, material.meta_bonificacao_kg, material.valor_bonificacao FROM materias_em_op INNER JOIN operacao_comercial on id_operacao_comercial = operacao_comercial.id INNER JOIN material on materias_em_op.id_material = material.id INNER JOIN catador on operacao_comercial.id_catador = catador.id GROUP BY operacao_comercial.id_catador, materias_em_op.id_material;");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                RelatorioBonificacao relatorio = new RelatorioBonificacao();
                relatorio.setId_catador(rs.getInt("id_catador"));
                relatorio.setId_material(rs.getInt("id_material"));
                relatorio.setTotal_vendido(rs.getDouble("total_vendido"));
                relatorio.setMeta_bonificacao_kg(rs.getDouble("meta_bonificacao_kg"));
                relatorio.setValor_bonificacao(rs.getDouble("valor_bonificacao"));
                relatorio.setNome_catador(rs.getString("nome_catador"));
                if (relatorio.quantidadeBonificacoesMerecidas() > 0) {
                    list.add(relatorio);
                }
            }
            for (int i = 0; i < list.size(); i++) {
                if (list.get(i).getTotal_vendido() >= list.get(i).getMeta_bonificacao_kg()) {
                    listCatadoresBonificar.add(list.get(i));
                }
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return listCatadoresBonificar;
    }

    public static List<Catador> getCatadores() {
        List<Catador> list = new ArrayList<Catador>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT id, nome, data_de_nascimento, cpf FROM catador ORDER BY id");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Catador catador = new Catador();
                catador.setId(rs.getInt("id"));
                catador.setNome(rs.getString("nome"));
                catador.setData_de_nascimento(rs.getDate("data_de_nascimento"));
                catador.setCpf(rs.getString("cpf"));
                list.add(catador);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }

    public static int getContagem() {
        int contagem = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS contagem FROM catador");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }

    public static Catador getCatadorById(int id) {
        Catador catador = null;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("select * from catador where id=?");
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                catador = new Catador();
                catador.setId(rs.getInt("id"));
                catador.setNome(rs.getString("nome"));
                catador.setCpf(rs.getString("cpf"));
                catador.setEndereco(rs.getString("endereco"));
                catador.setEmail(rs.getString("email"));
                catador.setTelefone(rs.getString("telefone"));

            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return catador;
    }

    public static int editarCatador(Catador catador) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("UPDATE catador SET nome=?, cpf=?, endereco=?, email=?, telefone=? WHERE id=?");
            ps.setString(1, catador.getNome());
            ps.setString(2, catador.getCpf());
            ps.setString(3, catador.getEndereco());
            ps.setString(4, catador.getEmail());
            ps.setString(5, catador.getTelefone());
            ps.setInt(6, catador.getId());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static List<Catador> getCatador() {
        List<Catador> list = new ArrayList<Catador>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM catador");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Catador catador = new Catador();
                catador.setId(rs.getInt("id"));
                catador.setNome(rs.getString("nome"));
                catador.setCpf(rs.getString("cpf"));
                catador.setEndereco(rs.getString("endereco"));
                catador.setData_de_nascimento(rs.getDate("data_de_nascimento"));
                catador.setEmail(rs.getString("email"));
                catador.setTelefone(rs.getString("telefone"));
                list.add(catador);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }

    public static int excluirCatador(Catador catador) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("DELETE FROM catador WHERE id=?");
            ps.setInt(1, catador.getId());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static int cadastrarCatador(Catador catador) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO CATADOR(NOME,CPF, ENDERECO, EMAIL, TELEFONE) VALUES(?,?,?,?,?)");
            ps.setString(1, catador.getNome());
            ps.setString(2, catador.getCpf());
            ps.setString(3, catador.getEndereco());
            ps.setString(4, catador.getEmail());
            ps.setString(5, catador.getTelefone());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }
}
