package dao;

import entidades.Bonificacao;
import entidades.Catador;
import entidades.MateriaisEmOperacaoComercial;
import entidades.OperacaoComercial;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

public class BonificacaoDao {

    public static int totalBonificacaoPorCatador(int idCatador, int idMaterial) {
        int contagem = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT sum(quantidade_referente) AS contagem FROM bonificacao INNER JOIN materias_em_op ON bonificacao.id_mat_em_op = materias_em_op.id INNER JOIN operacao_comercial on materias_em_op.id_operacao_comercial = operacao_comercial.id WHERE operacao_comercial.id_catador = ? AND materias_em_op.id_material = ?");
            ps.setInt(1, idCatador);
            ps.setInt(2, idMaterial);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }

    public static int inserirBonificacao(Bonificacao bonificacao) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO BONIFICACAO(VALOR,ID_MAT_EM_OP, STATUS, QUANTIDADE_REFERENTE) VALUES(?,?,?,?)");
            ps.setDouble(1, bonificacao.getValor());
            ps.setInt(2, bonificacao.getMatEmOp().getId());
            ps.setString(3, bonificacao.getStatus());
            ps.setInt(4, bonificacao.getQuantidadeReferente());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static double totalAPagarPorCatador(int idCatador) {
        int total = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT SUM(valor) as valor FROM bonificacao INNER JOIN materias_em_op on bonificacao.id_mat_em_op = materias_em_op.id INNER JOIN operacao_comercial on materias_em_op.id_operacao_comercial = operacao_comercial.id WHERE status = 'pendente' AND operacao_comercial.id_catador = ?");
            ps.setInt(1, idCatador);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                total = rs.getInt("valor");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }

        return total;
    }

    public static void confirmandoBonificacoes(int idCatador) {
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("UPDATE bonificacao INNER JOIN materias_em_op on bonificacao.id_mat_em_op = materias_em_op.id INNER JOIN operacao_comercial on operacao_comercial.id = materias_em_op.id_operacao_comercial SET status = \"pago\" WHERE operacao_comercial.id_catador = ?;");
            ps.setInt(1, idCatador);
            ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
    }
    
     public static List<Bonificacao> getBonificacoes(int inicio, int total) {
        List<Bonificacao> list = new ArrayList<Bonificacao>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT bonificacao.*, catador.nome, materias_em_op.id as id_mat_op, operacao_comercial.id as id_op FROM `bonificacao` INNER JOIN materias_em_op on materias_em_op.id = bonificacao.id_mat_em_op INNER JOIN operacao_comercial on operacao_comercial.id = materias_em_op.id_operacao_comercial INNER JOIN catador on catador.id = operacao_comercial.id_catador ORDER BY id LIMIT " + (inicio - 1) + ", " + total);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Bonificacao bonificacao = new Bonificacao();
                bonificacao.setId(rs.getInt("id"));
                bonificacao.setValor(rs.getDouble("valor"));
                bonificacao.setStatus(rs.getString("status"));
                
                Catador catador = new Catador();
                catador.setNome(rs.getString("nome"));
                
                OperacaoComercial op = new OperacaoComercial();
                op.setId(rs.getInt("id_op"));
                op.setCatador(catador);
                
                MateriaisEmOperacaoComercial matOp = new MateriaisEmOperacaoComercial();
                matOp.setId(rs.getInt("id_mat_em_op"));
                matOp.setOperacaoComercial(op);
                
                bonificacao.setMatEmOp(matOp);
                list.add(bonificacao);
               
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
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS contagem FROM bonificacao");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }
}
